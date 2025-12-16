<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBQ Michał Blandzi</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css"> <!-- FA4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!-- FA6 -->
    <link rel="stylesheet" href="css/camera.css">
    <link rel="stylesheet" href="css/prettyPhoto.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700" rel="stylesheet">

    <script src="js/jquery-1.8.3.min.js"></script>
</head>

<body>
<!-- CONTACT BUBBLE (clean, fixed, delayed) -->
<div id="contact-bubble" data-key="bubble.text">
    Zainteresowana/y? Skontaktuj się z nami!
</div>

<script>
/* CONTACT BUBBLE – delayed show + click scroll */
(function() {
    function showBubbleDelayed() {
        const bubble = document.getElementById('contact-bubble');
        if (!bubble) return;

        // Hidden initially
        bubble.style.display = 'none';
        bubble.style.opacity = '0';
        bubble.style.visibility = 'hidden';

        // Show after 5s
        setTimeout(() => {
            bubble.style.display = 'block';
            bubble.style.visibility = 'visible';
            bubble.style.transition = 'opacity .5s ease';
            requestAnimationFrame(() => bubble.style.opacity = '1');
        }, 5000);
    }

    // Ensure DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', showBubbleDelayed);
    } else {
        showBubbleDelayed();
    }

    /* Click to scroll to contact section */
    document.addEventListener('click', function(e) {
        const bubble = document.getElementById('contact-bubble');
        if (!bubble) return;

        if (e.target === bubble || bubble.contains(e.target)) {
            const contact = document.getElementById('contact');
            const header = document.getElementById('menuF');
            if (!contact) return;

            const headerH = header ? header.offsetHeight : 70;
            const y = contact.getBoundingClientRect().top + window.pageYOffset - headerH - 8;

            window.scrollTo({ top: y, behavior: 'smooth' });
        }
    });
})();
</script>

<!-- HEADER (fixed black bar is inside #menuF) -->
<div id="home">
    <div class="headerLine">

        <div id="menuF" class="default" role="navigation" aria-label="Główne menu">
            <div class="container">
                <div class="row" style="align-items:center;">

                    <!-- LOGO (left) -->
                    <div class="logo col-md-4 col-sm-6 col-xs-6">
                        <a href="#home" aria-label="MBQ home">
                            <img id="logo-main" src="images/logo.png" alt="MBQ">
                        </a>
                    </div>

                    <!-- RIGHT CONTROLS: language + hamburger -->
                    <div class="col-md-8 col-sm-6 col-xs-6">

                        <!-- language switch on top bar -->
                        <button id="lang-switch" aria-label="Zmień język">EN</button>

                        <!-- hamburger to open right side menu -->
                        <button id="hamburger" aria-label="Otwórz menu" class="hamburger-btn" type="button">
                            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <!-- RIGHT-SLIDE MENU (hidden by default) -->
        <nav id="sideMenu" aria-hidden="true" role="menu">
            <button id="sideClose" aria-label="Zamknij menu">&times;</button>
            <ul>
                <li><a href="#home" data-key="nav.home">Home</a></li>
                <li><a href="#about" data-key="nav.services">Usługi</a></li>
                <li><a href="#project" data-key="nav.projects">Realizacje</a></li>
                <li><a href="#aboutus" data-key="nav.about">O nas</a></li>
                <li><a href="#contact" data-key="nav.contact">Kontakt</a></li>
            </ul>
        </nav>
        <div id="sideMenuOverlay" aria-hidden="true"></div>

        <!-- SLIDER -->
        <div class="container-fluid">
            <div class="camera_wrap camera_white_skin" id="camera_wrap_1">

                <div data-src="images/slides/blank.gif">
                    <div class="camera_caption fadeFromBottom">
                        <h2 data-key="slide.one">Budowa?</h2>
                    </div>
                </div>

                <div data-src="images/slides/blank.gif">
                    <div class="camera_caption fadeFromBottom">
                        <h2 data-key="slide.two">Remont?</h2>
                    </div>
                </div>

                <div data-src="images/slides/blank.gif">
                    <div class="camera_caption fadeFromBottom">
                        <h2 data-key="slide.three">Nie ma problemu.</h2>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- USŁUGI -->
<div id="about" class="section">
    <div class="container text-center">
        <h3 data-key="services.title">Zakres usług MBQ</h3>
        <p data-key="services.desc">Co możemy dla Ciebie wykonać — kompleksowo...</p>
    </div>

    <div class="container">
        <!-- responsive grid: 3 cols desktop, 2 tablet, 1 mobile -->
        <div class="services-grid">

            <!-- each service-box has data-folder matching the folder name under images/realizacje -->
            <div class="service-box" role="button" tabindex="0" data-folder="domy_szkieletowe" aria-label="Domy szkieletowe">
                <i class="fa-solid fa-house"></i>
                <h4 data-key="svc.houses">Domy szkieletowe</h4>
            </div>

            <div class="service-box" role="button" tabindex="0" data-folder="elewacje" aria-label="Elewacje">
                <i class="fa-solid fa-building"></i>
                <h4 data-key="svc.elev">Elewacje</h4>
            </div>

            <div class="service-box" role="button" tabindex="0" data-folder="tarasy" aria-label="Tarasy">
                <i class="fa-solid fa-border-style"></i>
                <h4 data-key="svc.terraces">Tarasy</h4>
            </div>

            <div class="service-box" role="button" tabindex="0" data-folder="sauny" aria-label="Sauny">
                <i class="fa-solid fa-fire"></i>
                <h4 data-key="svc.saunas">Sauny</h4>
            </div>

            <div class="service-box" role="button" tabindex="0" data-folder="ogrodzenie" aria-label="Ogrodzenia">
                <i class="fa-solid fa-bars"></i>
                <h4 data-key="svc.fences">Ogrodzenia</h4>
            </div>

            <div class="service-box" role="button" tabindex="0" data-folder="projekty_3d" aria-label="Projekty 3D">
                <i class="fa-solid fa-cubes"></i>
                <h4 data-key="svc.3d">Projekty 3D</h4>
            </div>

        </div>
    </div>
</div>

<!-- REALIZACJE -->
<?php include 'realizacje.php'; ?>

<!-- O NAS -->
<div id="aboutus" class="section aboutus-section">
    <div class="container">
        <div class="aboutus-content">
            <h2 class="section-title" data-key="aboutus.title">MBQ jest firmą, której szukałeś!</h2>
            <p class="aboutus-description" data-key="aboutus.description">Jesteśmy firmą specjalizującą się w projektowaniu i budowie domów szkieletowych oraz realizacji kompleksowych usług budowlanych. Nasz zespół doświadczonych specjalistów zapewnia profesjonalną obsługę na każdym etapie - od projektu po realizację.</p>
        </div>
        
        <!-- Features -->
        <div class="row about-features">
            <div class="col-md-4 col-sm-4">
                <div class="about-feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <h4 data-key="aboutus.feature1.title">Jakość i Precyzja</h4>
                    <p data-key="aboutus.feature1.desc">Każdy projekt wykonujemy z najwyższą starannością i dbałością o detale.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="about-feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <h4 data-key="aboutus.feature2.title">Terminowość</h4>
                    <p data-key="aboutus.feature2.desc">Dotrzymujemy ustalonych terminów i harmonogramów prac.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="about-feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <h4 data-key="aboutus.feature3.title">Doświadczony Zespół</h4>
                    <p data-key="aboutus.feature3.desc">Nasz zespół to wykwalifikowani specjaliści z wieloletnim doświadczeniem.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- KONTAKT -->
<div id="contact" class="section contact-section">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center contact-header">
            <h2 class="section-title" data-key="contact.title">Skontaktuj się z nami!</h2>
            <p class="section-subtitle" data-key="contact.subtitle">Czekamy na Twój telefon lub wiadomość.</p>
        </div>

        <!-- Contact Info -->
        <div class="contact-phone-cta">
            <a href="tel:+48515091300" class="phone-number">
                <i class="fa fa-phone"></i>
                <span>515 091 300</span>
            </a>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-simple">
            <h3 class="form-title" data-key="contact.form.title">Napisz do nas</h3>
            <form id="contactForm" method="post" action="contact.php">
                <input type="hidden" name="lang" id="contact-lang" value="pl">

                <div class="form-group">
                    <input type="text" name="name" class="form-control" data-key="form.name"
                           placeholder="Imię i nazwisko" required>
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control" data-key="form.email"
                           placeholder="Email" required>
                </div>

                <div class="form-group">
                    <textarea name="message" class="form-control" data-key="form.message"
                              placeholder="Wiadomość" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-contact-submit" data-key="contact.send">Wyślij</button>
            </form>
        </div>
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <!-- Company Info -->
            <div class="col-md-5 col-sm-12">
                <div class="footer-section">
                    <h3 data-key="footer.about">O firmie</h3>
                    <img src="images/logo.png" alt="MBQ Logo" class="footer-logo">
                    <p data-key="footer.description">Profesjonalne wykonawstwo domów szkieletowych, tarasów, ogrodzeń i elewacji. Jakość i precyzja w każdym projekcie.</p>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-md-3 col-sm-6">
                <div class="footer-section">
                    <h3 data-key="footer.links">Linki</h3>
                    <ul class="footer-links">
                        <li><a href="#home" data-key="nav.home">Home</a></li>
                        <li><a href="#about" data-key="nav.services">Usługi</a></li>
                        <li><a href="#project" data-key="nav.projects">Realizacje</a></li>
                        <li><a href="#aboutus" data-key="nav.about">O nas</a></li>
                        <li><a href="#contact" data-key="nav.contact">Kontakt</a></li>
                    </ul>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-md-4 col-sm-6">
                <div class="footer-section">
                    <h3 data-key="footer.contact">Kontakt</h3>
                    <ul class="footer-contact">
                        <li><i class="fa fa-envelope"></i> <a href="mailto:mbq.kontakt@gmail.com">mbq.kontakt@gmail.com</a></li>
                        <li><i class="fa fa-phone"></i> <a href="tel:+48515091300" data-key="footer.phone">+48 515 091 300</a></li>
                        <li><i class="fa fa-map-marker"></i> <span data-key="footer.location">Polska</span></li>
                        <li><i class="fa fa-clock-o"></i> <span data-key="footer.hours">Pn-Pt: 8:00 - 18:00</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p data-key="footer.copy">&copy; 2025 MBQ Michał Blandzi. <span data-key="footer.rights">Wszelkie prawa zastrzeżone.</span></p>
        </div>
    </div>
</footer>

<!-- JS -->
<script src="js/jquery.mobile.customized.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/camera.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>

<script>
/* SLIDER */
jQuery(function () {
    jQuery('#camera_wrap_1').camera({
        height: '490px',
        loader: false,
        pagination: true,
        navigation: false,
        playPause: false,
        time: 3000,
        transPeriod: 800
    });
});

/* SIDE MENU (RIGHT PANEL) */
(function() {
    const hamburger = document.getElementById('hamburger');
    const side = document.getElementById('sideMenu');
    const overlay = document.getElementById('sideMenuOverlay');
    const sideClose = document.getElementById('sideClose');

    function openSide() {
        side.classList.add('open');
        overlay.classList.add('visible');
        side.setAttribute('aria-hidden','false');
        overlay.setAttribute('aria-hidden','false');
    }
    function closeSide() {
        side.classList.remove('open');
        overlay.classList.remove('visible');
        side.setAttribute('aria-hidden','true');
        overlay.setAttribute('aria-hidden','true');
    }

    hamburger.addEventListener('click', function(e){
        e.stopPropagation();
        openSide();
    });

    sideClose.addEventListener('click', closeSide);
    overlay.addEventListener('click', closeSide);

    // Close when clicking a menu link
    side.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', function(e) {
            closeSide();
            const href = this.getAttribute('href');
            if (!href || href === '#') return;
            
            const targetId = href.substring(1);
            const target = document.getElementById(targetId) || document.querySelector('[name="' + targetId + '"]');
            
            if (target) {
                e.preventDefault();
                const headerH = document.getElementById('menuF').offsetHeight || 70;
                const top = target.getBoundingClientRect().top + window.pageYOffset - headerH - 8;
                window.scrollTo({ top: top, behavior: 'smooth' });
            }
        });
    });

    // ESC closes menu
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeSide();
    });
})();

/* SCROLL OFFSET for anchor links */
(function () {
    const headerHeight = () => document.getElementById('menuF').offsetHeight || 70;

    function handleAnchorClick(e) {
        const href = this.getAttribute('href');
        if (!href || href === '#') return;

        const targetId = href.substring(1);
        const target = document.getElementById(targetId) || document.querySelector('[name="' + targetId + '"]');

        if (target) {
            e.preventDefault();
            const top = target.getBoundingClientRect().top + window.pageYOffset - headerHeight() - 8;
            window.scrollTo({ top: top, behavior: 'smooth' });
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('a[href^="#"]').forEach(a => a.addEventListener('click', handleAnchorClick));
    });
})();

/* SERVICES → trigger project filter */
(function() {
    function emitProjectFilter(folder) {
        // Dispatch event for realizacje.php to listen
        document.dispatchEvent(new CustomEvent('projectFilterRequested', { detail: { folder } }));
        
        // Set URL param for shareability
        try {
            const url = new URL(window.location);
            url.searchParams.set('kategoria', folder);
            window.history.replaceState({}, '', url);
        } catch(e) {}
        
        // Scroll to projects section
        const headerH = document.getElementById('menuF') ? document.getElementById('menuF').offsetHeight : 70;
        const target = document.getElementById('project');
        if (target) {
            const top = target.getBoundingClientRect().top + window.pageYOffset - headerH - 8;
            window.scrollTo({ top: top, behavior: 'smooth' });
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.service-box[data-folder]').forEach(el => {
            el.addEventListener('click', function() { 
                emitProjectFilter(el.getAttribute('data-folder')); 
            });
            
            // Keyboard support: Enter or Space
            el.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    emitProjectFilter(el.getAttribute('data-folder'));
                }
            });
        });
    });
})();
</script>

<!-- TRANSLATIONS -->
<script>
const translations = {
    "pl": {
        "nav.home": "Home",
        "nav.services": "Usługi",
        "nav.projects": "Realizacje",
        "nav.about": "O nas",
        "nav.contact": "Kontakt",

        "slide.one": "Budowa?",
        "slide.two": "Remont?",
        "slide.three": "Nie ma problemu.",

        "services.title": "Zakres usług MBQ",
        "services.desc": "Co możemy dla Ciebie wykonać — kompleksowo...",

        "svc.houses": "Domy szkieletowe",
        "svc.elev": "Elewacje",
        "svc.terraces": "Tarasy",
        "svc.saunas": "Sauny",
        "svc.fences": "Ogrodzenia",
        "svc.3d": "Projekty 3D",

        "projects.title": "Nasze realizacje",
        "projects.subtitle": "Wybierz kategorię, aby filtrować",
        "projects.more": "Pokaż więcej",

        "filter.all": "Wszystkie",
        "filter.domy_szkieletowe": "Domy szkieletowe",
        "filter.elewacje": "Elewacje",
        "filter.tarasy": "Tarasy",
        "filter.sauny": "Sauny",
        "filter.ogrodzenie": "Ogrodzenia",
        "filter.projekty_3d": "Projekty 3D",

        "aboutus.title": "MBQ jest firmą, której szukałeś!",
        "aboutus.subtitle": "Tworzymy przestrzeń Twoich marzeń – od projektu po realizację",
        "aboutus.feature1.title": "Jakość i Precyzja",
        "aboutus.feature1.desc": "Każdy projekt wykonujemy z najwyższą starannością i dbałością o detale.",
        "aboutus.feature2.title": "Terminowość",
        "aboutus.feature2.desc": "Dotrzymujemy ustalonych terminów i harmonogramów prac.",
        "aboutus.feature3.title": "Doświadczony Zespół",
        "aboutus.feature3.desc": "Nasz zespół to wykwalifikowani specjaliści z wieloletnim doświadczeniem.",
        "aboutus.stat1": "Lat Doświadczenia",
        "aboutus.stat2": "Zrealizowanych Projektów",
        "aboutus.stat3": "Zadowolonych Klientów",

        "contact.title": "Skontaktuj się z nami!",
        "contact.subtitle": "Czekamy na Twój telefon lub wiadomość.",
        "contact.form.title": "Napisz do nas",

        "form.name": "Imię i nazwisko",
        "form.email": "Email",
        "form.message": "Wiadomość",

        "contact.send": "Wyślij",

        "bubble.text": "Zainteresowana/y? Skontaktuj się z nami!",
        "footer.copy": "© 2025 MBQ Michał Blandzi.",
        "footer.rights": "Wszelkie prawa zastrzeżone.",
        "footer.about": "O firmie",
        "footer.description": "Profesjonalne wykonawstwo domów szkieletowych, tarasów, ogrodzeń i elewacji. Jakość i precyzja w każdym projekcie.",
        "footer.links": "Linki",
        "footer.contact": "Kontakt",
        "footer.phone": "+48 515 091 300",
        "footer.location": "Polska",
        "footer.hours": "Pn-Pt: 8:00 - 18:00"
    },

    "en": {
        "nav.home": "Home",
        "nav.services": "Services",
        "nav.projects": "Projects",
        "nav.about": "About us",
        "nav.contact": "Contact",

        "slide.one": "Construction?",
        "slide.two": "Renovation?",
        "slide.three": "No problem.",

        "services.title": "Range of MBQ services",
        "services.desc": "What we can do for you — fully, professionally and stress-free.",

        "svc.houses": "Timber houses",
        "svc.elev": "Elevations",
        "svc.terraces": "Terraces",
        "svc.saunas": "Saunas",
        "svc.fences": "Fences",
        "svc.3d": "3D Projects",

        "projects.title": "Our projects",
        "projects.subtitle": "Choose a category to filter",
        "projects.more": "Show more",

        "filter.all": "All",
        "filter.domy_szkieletowe": "Timber houses",
        "filter.elewacje": "Elevations",
        "filter.tarasy": "Terraces",
        "filter.sauny": "Saunas",
        "filter.ogrodzenie": "Fences",
        "filter.projekty_3d": "3D Projects",

        "aboutus.title": "MBQ is the company you were looking for!",
        "aboutus.subtitle": "Creating your dream space – from design to completion",
        "aboutus.feature1.title": "Quality and Precision",
        "aboutus.feature1.desc": "We execute every project with the utmost care and attention to detail.",
        "aboutus.feature2.title": "Timeliness",
        "aboutus.feature2.desc": "We meet agreed deadlines and work schedules.",
        "aboutus.feature3.title": "Experienced Team",
        "aboutus.feature3.desc": "Our team consists of qualified specialists with many years of experience.",
        "aboutus.stat1": "Years of Experience",
        "aboutus.stat2": "Completed Projects",
        "aboutus.stat3": "Satisfied Clients",

        "contact.title": "Contact us!",
        "contact.subtitle": "We're waiting for your message.",
        "contact.form.title": "Send us a message",

        "form.name": "Full name",
        "form.email": "Email",
        "form.message": "Message",

        "contact.send": "Send",

        "bubble.text": "Interested? Contact us!",
        "footer.copy": "© 2025 MBQ Michał Blandzi.",
        "footer.rights": "All rights reserved.",
        "footer.about": "About Company",
        "footer.description": "Professional construction of frame houses, terraces, fences and facades. Quality and precision in every project.",
        "footer.links": "Links",
        "footer.contact": "Contact",
        "footer.phone": "+48 515 091 300",
        "footer.location": "Poland",
        "footer.hours": "Mon-Fri: 8:00 AM - 6:00 PM"
    }
};

let currentLang = 'pl';

function applyLang(lang) {
    currentLang = lang;

    document.querySelectorAll('[data-key]').forEach(node => {
        const key = node.getAttribute('data-key');
        if (!key) return;

        const val = translations[lang] && translations[lang][key];
        if (typeof val === 'undefined') return;

        if (
            (node.tagName.toLowerCase() === 'input' ||
                node.tagName.toLowerCase() === 'textarea') &&
            typeof node.placeholder !== "undefined"
        ) {
            node.placeholder = val;
        } else {
            node.innerHTML = val;
        }
    });

    const langBtn = document.getElementById('lang-switch');
    if (langBtn) langBtn.textContent = lang === 'pl' ? 'EN' : 'PL';

    const hiddenLang = document.getElementById('contact-lang');
    if (hiddenLang) hiddenLang.value = lang;

    if (typeof onGlobalLangChange === 'function') {
        onGlobalLangChange(lang);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    applyLang('pl');

    setTimeout(() => {
        const bubble = document.getElementById('contact-bubble');
        if (bubble) bubble.style.display = 'block';
    }, 5000);
});

document.getElementById('lang-switch').addEventListener('click', function () {
    const newLang = currentLang === 'pl' ? 'en' : 'pl';
    applyLang(newLang);
});

/* PrettyPhoto bubble handling */
$(document).on('click', "a[rel^='prettyPhoto']", () => {
    $('#contact-bubble').hide();
});

document.addEventListener('pp_closed', () => {
    setTimeout(() => {
        const bubble = document.getElementById('contact-bubble');
        if (bubble) bubble.style.display = 'block';
    }, 6000);
});
</script>

</body>
</html>
