<?php
// realizacje.php
// Plik odpowiedzialny za dynamiczną galerię realizacji:
// - automatyczne wczytywanie zdjęć z katalogów
// - filtrowanie po kategoriach
// - losową kolejność
// - obsługę wielojęzyczności
// - przycisk „więcej”

$base_dir = __DIR__ . '/images/realizacje'; // katalog z realizacjami na serwer
$base_url = 'images/realizacje'; // ścieżka publiczna do zdjęć
$categories = [];

/* ===============================
   SKANOWANIE KATALOGÓW REALIZACJI
   ===============================
   Każdy podfolder traktowany jest
   jako osobna kategoria realizacji.
*/
if (is_dir($base_dir)) {
    foreach (scandir($base_dir) as $d) {
        if ($d === '.' || $d === '..') continue;
        if (is_dir("$base_dir/$d")) {

          // generowanie bezpiecznego identyfikatora (slug)
            $slug = 'cat-' . preg_replace('/[^a-z0-9_-]/', '-', strtolower($d));
            $categories[$slug] = $d;
        }
    }
}

/* ===============================
   BUDOWANIE LISTY ZDJĘĆ
   ===============================
   Pobieranie wszystkich plików graficznych
   z wykrytych kategorii.
*/
$images = [];
foreach ($categories as $slug => $folder) {
    $dir = "$base_dir/$folder";

    // filtrowanie tylko plików graficznych
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
// konwersja danych do formatu JSON (przekazanie do JavaScript)
$images_json = json_encode($images);
$categories_json = json_encode($categories);

/* ===============================
   MAPOWANIE NAZW KATEGORII
   ===============================
   Powiązanie nazw folderów z:
   - nazwą PL
   - nazwą EN
   - kluczem tłumaczeń
*/
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

<!-- SEKCJA REALIZACJI -->
<div id="project">
  <div class="container text-center">

    <h3 data-key="projects.title">Nasze realizacje</h3>
    <p data-key="projects.subtitle">Wybierz kategorię aby filtrować</p>

    <!-- przyciski filtrowania -->
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
        <!-- Kontener na siatkę galerii -->
    <div class="row gallery-grid" id="gallery-container"></div>

    <div style="text-align: center; margin-top: 30px;">

      <!-- Przycisk „więcej” do pokazania większej ilości zdjęć-->
      <button id="load-more" style="display:none;" data-key="projects.more">
        Więcej
      </button>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  
  // dane przekazane z PHP
  const allImages = <?= $images_json ?>;
  const categories = <?= $categories_json ?>;

  // losowanie kolejności zdjęć
  function shuffle(a) { 
    for (let i = a.length - 1; i > 0; i--) { 
      const j = Math.floor(Math.random() * (i + 1)); 
      [a[i], a[j]] = [a[j], a[i]];
    } 
    return a; 
  }

  const randomized = shuffle(allImages.slice());

  // aktualny filtr i liczba wyświetlanych elementów
  let activeFilter = "all";
  let shownCount = (window.innerWidth < 992) ? 6 : 9;

  // RESPONSYWANE ILOŚĆ ELEMENTÓW
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

  // renderowanie galerii
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

  // znajdowanie identyfikatora fltra na podstawie nazwy folderu
  function slugForFolder(folder) {
    for (const s in categories) {
      if (categories[s] === folder) return s;
    }
    const guess = 'cat-' + folder.toLowerCase().replace(/[^a-z0-9_-]/g, '-');
    return (guess in categories) ? guess : null;
  }

  
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

  // Udostępnienie funkcji filtrowania globalnie
  window.setProjectFilter = applyFilterBy;

  // Pierwsze wyświetlenie galerii
  renderGallery(shownCount);

  // obsługa przycisków filtrowania
  filterButtons().forEach(btn => {
    btn.addEventListener("click", () => {

      // aktualizacja aktywnego przycisku
      filterButtons().forEach(b => b.classList.remove("active"));
      btn.classList.add("active");
      activeFilter = btn.dataset.filter;
      shownCount = 9;
      
      // aktualizacja parametru URL (bez przeładowania strony)
      try {
        const url = new URL(window.location);
        if (activeFilter === 'all') {
          url.searchParams.delete('kategoria');
        } else {
          url.searchParams.set('kategoria', activeFilter);
        }
        window.history.pushState({}, '', url);
      } catch(e) {
        console.log('URL update failed:', e);
      }
      
      renderGallery(shownCount);
    });
  });


  document.addEventListener('projectFilterRequested', function(e) {
    const folder = e && e.detail && e.detail.folder;
    if (!folder) return;
    applyFilterBy(folder);
  });

  
  try {
    const params = new URLSearchParams(window.location.search);
    const k = params.get('kategoria');
    if (k) {
      setTimeout(() => applyFilterBy(k), 120);
    }
  } catch(e) {}

 
  loadMoreBtn.addEventListener("click", () => {
    shownCount += 9;
    renderGallery(shownCount);
  });
});
</script>
