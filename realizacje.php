<?php
// realizacje.php — gallery with filtering, translations, random order and "show more"

$base_dir = __DIR__ . '/images/realizacje';
$base_url = 'images/realizacje';
$categories = [];

// Scan folders
if (is_dir($base_dir)) {
    foreach (scandir($base_dir) as $d) {
        if ($d === '.' || $d === '..') continue;
        if (is_dir("$base_dir/$d")) {
            $slug = 'cat-' . preg_replace('/[^a-z0-9_-]/', '-', strtolower($d));
            $categories[$slug] = $d;
        }
    }
}

// Build image list
$images = [];
foreach ($categories as $slug => $folder) {
    $dir = "$base_dir/$folder";
    $files = array_values(array_filter(scandir($dir), fn($f) =>
        preg_match('/\.(jpg|jpeg|png|gif)$/i', $f)
    ));
    foreach ($files as $file) {
        $images[] = [
            'url' => "$base_url/" . rawurlencode($folder) . "/" . rawurlencode($file),
            'slug' => $slug,
            'folder' => $folder
        ];
    }
}

$images_json = json_encode($images);
$categories_json = json_encode($categories);

// Category name mapping for PL/EN translations
$name_map = [
    'domy_szkieletowe' => [
        'pl' => 'Domy szkieletowe',
        'en' => 'Timber houses',
        'key' => 'filter.domy_szkieletowe'
    ],
    'elewacje' => [
        'pl' => 'Elewacje',
        'en' => 'Elevations',
        'key' => 'filter.elewacje'
    ],
    'tarasy' => [
        'pl' => 'Tarasy',
        'en' => 'Terraces',
        'key' => 'filter.tarasy'
    ],
    'sauny' => [
        'pl' => 'Sauny',
        'en' => 'Saunas',
        'key' => 'filter.sauny'
    ],
    'ogrodzenia' => [
        'pl' => 'Ogrodzenia',
        'en' => 'Fences',
        'key' => 'filter.ogrodzenia'
    ],
    'projekty_3d' => [
        'pl' => 'Projekty 3D',
        'en' => '3D Projects',
        'key' => 'filter.projekty_3d'
    ]
];
?>

<!-- GALLERY SECTION -->
<div id="project">
  <div class="container text-center">

    <h3 data-key="projects.title">Nasze realizacje</h3>
    <p data-key="projects.subtitle">Wybierz kategorię aby filtrować</p>

    <div class="filters">
      <button class="filter-btn active" data-filter="all" data-key="filter.all">Wszystkie</button>

      <?php foreach ($categories as $slug => $folder):
        $map = $name_map[$folder] ?? null;

        if ($map) {
            $display = $map['pl'];
            $key = $map['key'];
        } else {
            $display = ucfirst(str_replace(['-', '_'], ' ', $folder));
            $key = 'filter.' . strtolower(str_replace(' ', '_', $display));
        }
      ?>
        <button class="filter-btn" data-filter="<?= $slug ?>" data-key="<?= $key ?>">
          <?= htmlspecialchars($display) ?>
        </button>
      <?php endforeach; ?>
    </div>

    <div class="row gallery-grid" id="gallery-container"></div>

    <div style="margin-top:20px;">
      <button id="load-more" class="btn btn-primary" style="display:none;" data-key="projects.more">
        Pokaż więcej
      </button>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const allImages = <?= $images_json ?>;
  const categories = <?= $categories_json ?>;

  function shuffle(a) { 
    for (let i = a.length - 1; i > 0; i--) { 
      const j = Math.floor(Math.random() * (i + 1)); 
      [a[i], a[j]] = [a[j], a[i]];
    } 
    return a; 
  }

  const randomized = shuffle(allImages.slice());
  let activeFilter = "all";
  let shownCount = (window.innerWidth < 992) ? 6 : 9;

  window.addEventListener("resize", function() {
    const newCount = (window.innerWidth < 992) ? 6 : 9;
    if (newCount !== shownCount) {
      shownCount = newCount;
      renderGallery(shownCount);
    }
  });

  const gallery = document.getElementById("gallery-container");
  const loadMoreBtn = document.getElementById("load-more");
  const filterButtons = () => [...document.querySelectorAll(".filter-btn")];

  function initPrettyPhoto() {
    if (!jQuery.prettyPhoto) return;
    jQuery("a[rel^='prettyPhoto']").prettyPhoto({
      theme: 'light_square',
      social_tools: '',
      deeplinking: false,
      callback: function() {
        document.dispatchEvent(new Event("pp_closed"));
      }
    });
  }

  function renderGallery(count) {
    gallery.innerHTML = "";

    const source = (activeFilter === "all")
      ? randomized
      : randomized.filter(i => i.slug === activeFilter);

    source.slice(0, count).forEach(img => {
      const col = document.createElement("div");
      col.className = "col-md-4 col-sm-6 gallery-item " + img.slug;
      col.innerHTML = `<a href="${img.url}" rel="prettyPhoto[gallery]"><img src="${img.url}" alt=""></a>`;
      gallery.appendChild(col);
    });

    initPrettyPhoto();
    loadMoreBtn.style.display = source.length > count ? "inline-block" : "none";
  }

  // Find slug by folder name
  function slugForFolder(folder) {
    for (const s in categories) {
      if (categories[s] === folder) return s;
    }
    const guess = 'cat-' + folder.toLowerCase().replace(/[^a-z0-9_-]/g, '-');
    return (guess in categories) ? guess : null;
  }

  // Set active filter programmatically
  function applyFilterBy(folderOrSlug) {
    let targetSlug = null;
    if (!folderOrSlug) {
      targetSlug = 'all';
    } else if (folderOrSlug.startsWith && folderOrSlug.startsWith('cat-')) {
      targetSlug = folderOrSlug;
    } else {
      targetSlug = slugForFolder(folderOrSlug);
    }
    if (!targetSlug) return;

    activeFilter = targetSlug;
    shownCount = (window.innerWidth < 992) ? 6 : 9;

    filterButtons().forEach(b => b.classList.remove('active'));
    const btn = document.querySelector('.filter-btn[data-filter="' + targetSlug + '"]');
    if (btn) btn.classList.add('active');

    renderGallery(shownCount);
  }

  // Expose for global use
  window.setProjectFilter = applyFilterBy;

  // Initial render
  renderGallery(shownCount);

  // Filter button actions
  filterButtons().forEach(btn => {
    btn.addEventListener("click", () => {
      filterButtons().forEach(b => b.classList.remove("active"));
      btn.classList.add("active");
      activeFilter = btn.dataset.filter;
      shownCount = 9;
      renderGallery(shownCount);
    });
  });

  // Listen for cross-page/service clicks
  document.addEventListener('projectFilterRequested', function(e) {
    const folder = e && e.detail && e.detail.folder;
    if (!folder) return;
    applyFilterBy(folder);
  });

  // Apply URL parameter if present
  try {
    const params = new URLSearchParams(window.location.search);
    const k = params.get('kategoria');
    if (k) {
      setTimeout(() => applyFilterBy(k), 120);
    }
  } catch(e) {}

  // Load more button
  loadMoreBtn.addEventListener("click", () => {
    shownCount += 9;
    renderGallery(shownCount);
  });

  // Language change handler
  window.onGlobalLangChange = function(lang) {
    if (typeof applyLang === "function") applyLang(lang);
  };

  // Hide bubble during preview
  $(document).on("click", "a[rel^='prettyPhoto']", () => $('#contact-bubble').hide());
});
</script>
