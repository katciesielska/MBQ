<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBQ Michał Blandzi</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/camera.css">
    <link rel="stylesheet" href="css/prettyPhoto.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700" rel="stylesheet">

    <script src="js/jquery-1.8.3.min.js"></script>
    

</head>

<body>

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

                    <!-- RIGHT CONTROLS: desktop menu + language + hamburger -->
                    <div class="col-md-8 col-sm-6 col-xs-6">

                        <!-- Desktop Navigation Menu -->
                        <nav class="desktop-menu">
                            <ul>
                                <li><a href="#home" data-key="nav.home">Home</a></li>
                                <li><a href="#about" data-key="nav.pricing">Cennik</a></li>
                                <li><a href="#project" data-key="nav.projects">Realizacje</a></li>
                                <li><a href="#aboutus" data-key="nav.about">O nas</a></li>
                                <li><a href="#contact" data-key="nav.contact">Kontakt</a></li>
                            </ul>
                        </nav>

                        <!-- language switch on top bar -->
                        <button id="lang-switch" aria-label="Zmień język">EN</button>

                        <!-- hamburger to open right side menu  -->
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
                <li><a href="#about" data-key="nav.pricing">Cennik</a></li>
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

<!-- CENNIK -->
<div id="about" class="section">

    <div class="container text-center">
        <h3 class="calculator-title" data-key="pricing.title">
            Cennik
        </h3>
        <p data-key="pricing.info.secondary"></p>
    </div>

    <div class="container">
        <!-- responsive grid: 3 cols desktop, 2 tablet, 1 mobile -->
        <div class="services-grid">

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

        </div> <!-- /.services-grid -->

        

        <!-- KALKULATORY USŁUG -->
        <div id="service-calculators" style="display:none; margin-top:40px;">
            
        </div>

    </div> <!-- /.container -->

</div> <!-- /#about -->

<!-- REALIZACJE -->
<?php include 'realizacje.php'; ?>

<!-- O NAS -->
<div id="aboutus" class="section aboutus-section">
    <div class="container">
        <div class="aboutus-content">
            <h2 class="section-title" data-key="aboutus.title">MBQ jest firmą, której szukałeś!</h2>
           <p class="aboutus-description" data-key="aboutus.description">
            Jesteśmy firmą realizującą projekty z zakresu budownictwa, konstrukcji drewnianych
            oraz rozwiązań indywidualnych. Oferujemy wsparcie na różnych etapach realizacji —
            od koncepcji i projektowania, po wykonanie wybranych elementów.
        </p>
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


        <!-- PODSUMOWANIE WYCEN -->
        <div id="quote-summary" style="display:none; margin-bottom:30px;">
            <h3 class="form-title" data-key="pricing.summary.title"></h3>
            <ul id="quote-summary-list" style="list-style:none; padding-left:0;"></ul>
        </div>

        <!-- Contact Form -->
        <!-- Contact Form -->
        <div class="contact-form-simple">
            <h3 class="form-title" data-key="contact.form.title">Napisz do nas</h3>
            <form id="contact-form" method="post" action="contact.php">
                <input type="hidden" name="lang" id="contact-lang" value="pl">
                <input type="hidden" name="quotes" id="quotes-data">

                <div class="form-group">
                    <input type="text" name="name" class="form-control" data-key="form.name"
                        placeholder="Imię i nazwisko" autocomplete="name" required>
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control" data-key="form.email"
                        placeholder="Email" autocomplete="email" required>
                </div>

                <div class="form-group">
                    <textarea name="message" class="form-control" data-key="form.message"
                            placeholder="Wiadomość" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-contact-submit" data-key="contact.send">
                    Wyślij
                </button>
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
                        <li><a href="#about" data-key="nav.pricing">Cennik</a></li>
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
                        <li><i class="fa fa-map-marker"></i> <span data-key="footer.location">Poznań, Polska</span></li>
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
    // zamykanie kliknięciem w overlay
    overlay.addEventListener('click', closeSide);

    // zamykanie przyciskiem X
    sideClose.addEventListener('click', closeSide);

    // zamykanie klawiszem ESC (bonus, bardzo UX)
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSide();
        }
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
        document.dispatchEvent(
            new CustomEvent('projectFilterRequested', { detail: { folder } })
        );

        // Set URL param for shareability
        try {
            const url = new URL(window.location);
            url.searchParams.set('kategoria', folder);
            window.history.replaceState({}, '', url);
        } catch (e) {}

        // Scroll to projects section
        const headerEl = document.getElementById('menuF');
        const headerH = headerEl ? headerEl.offsetHeight : 70;
        const target = document.getElementById('project');

        if (target) {
            const top =
                target.getBoundingClientRect().top +
                window.pageYOffset -
                headerH -
                8;

            window.scrollTo({ top: top, behavior: 'smooth' });
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.service-box[data-folder]').forEach(el => {

            // CLICK
            el.addEventListener('click', function (e) {

                // 👉 OPCJA A: kalkulator ma priorytet
                const calculators = document.getElementById('service-calculators');
                if (calculators && calculators.style.display === 'block') {
                    return;
                }

                emitProjectFilter(el.getAttribute('data-folder'));
            });

            // KEYBOARD (Enter / Space)
            el.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();

                    const calculators = document.getElementById('service-calculators');
                    if (calculators && calculators.style.display === 'block') {
                        return;
                    }

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
        "nav.pricing": "Cennik",
        "nav.projects": "Realizacje",
        "nav.about": "O nas",
        "nav.contact": "Kontakt",

        "slide.one": "Budowa?",
        "slide.two": "Remont?",
        "slide.three": "Nie ma problemu.",

        "pricing.summary.title": "Wybrane wyceny",

        "pricing.info.main": "Tutaj możesz uzyskać orientacyjny zakres cenowy usługi dopasowany do Twoich potrzeb.",
        "pricing.info.secondary": "Możesz uzupełnić jeden lub kilka kalkulatorów. Po wysłaniu formularza kontaktowego poniżej, otrzymasz zakres cenowy drogą mailową.",


        "pricing.title": "Cennik",
        "pricing.subtitle": "Wybierz elementy, aby sprawdzić orientacyjny zakres cenowy.",

        "pricing.houses.type": "Typ domu",
        "pricing.houses.surface": "Powierzchnia [m²]",
        "pricing.houses.wood_type": "Rodzaj drewna",
        "pricing.houses.state": "Stan realizacji",
        "pricing.houses.notes":"Uwagi",
        "pricing.submit": "Uzyskaj wycenę",
        "pricing.notes": "Uwagi",
        "pricing.surface": "Powierzchnia [m²]",
        "pricing.length": "Długość [m]",
        "pricing.height": "Wysokość [m]",
        "pricing.part_of_house": "Element jest częścią domu szkieletowego",
        "pricing.project.desc": "Opis projektu",
        "pricing.sauna.type": "Typ sauny",
        "remove": "Usuń",

        "pricing.select": "-- wybierz --",

        "pricing.houses.type.all_year": "Całoroczny",
        "pricing.houses.type.seasonal": "Letniskowy",
        "pricing.houses.type.rod": "ROD",

        "pricing.houses.wood.pine": "Sosna",
        "pricing.houses.wood.spruce": "Świerk",
        "pricing.houses.wood.oak": "Dąb",
        "pricing.houses.wood.larch": "Modrzew",

        "pricing.houses.state.raw": "Surowy",
        "pricing.houses.state.dev": "Deweloperski",
        "pricing.elev.type": "Typ elewacji",
        "pricing.elev.type.wood": "Drewniana",
        "pricing.elev.type.plaster": "Tynkowa",
        "pricing.elev.type.composite": "Kompozytowa",
        "pricing.elev.frame_house": "Element domu szkieletowego",

        "pricing.fence.type": "Typ ogrodzenia",
        "pricing.fence.type.wood": "Drewniane",
        "pricing.fence.type.metal": "Metalowe",
        "pricing.fence.type.composite": "Kompozytowe",
        "pricing.fence.gate": "Brama",
        "pricing.fence.gate_type": "Typ bramy",
        "pricing.fence.gate.sliding": "Przesuwna",
        "pricing.fence.gate.swing": "Skrzydłowa",
        "pricing.fence.automatic": "Automatyczna",
        "pricing.fence.wicket": "Furtka",

        "pricing.terrace.material": "Materiał",
        "pricing.terrace.wood": "Drewno",
        "pricing.terrace.composite": "Kompozyt",
        "pricing.terrace.tiles": "Płyty tarasowe",
        "pricing.terrace.stairs": "Schody",
        "pricing.terrace.railing": "Barierka",
        "pricing.terrace.roof": "Zadaszenie",

        "pricing.sauna.type": "Typ sauny",
        "pricing.sauna.dry": "Sucha (fińska)",
        "pricing.sauna.steam": "Parowa",
        "pricing.sauna.infra": "Infrared",
        "pricing.sauna.people": "Liczba osób",
        "pricing.sauna.1_2": "1–2 osoby",
        "pricing.sauna.2_4": "2–4 osoby",
        "pricing.sauna.4_6": "4–6 osób",
        "pricing.sauna.6_plus": "Powyżej 6 osób",

        "pricing.project.info": "Projekt wykonywany w profesjonalnym oprogramowaniu CAD (Autodesk Inventor).",
        "pricing.project.time": "Preferowany termin realizacji",
        "pricing.project.7": "Do 7 dni",
        "pricing.project.14": "Do 14 dni",
        "pricing.project.21": "Do 21 dni",
        "pricing.project.30": "Powyżej 30 dni",

       





        "svc.houses": "Domy szkieletowe",
        "svc.elev": "Elewacje",
        "svc.terraces": "Tarasy",
        "svc.saunas": "Sauny",
        "svc.fences": "Ogrodzenia",
        "svc.3d": "Projekty 3D",

        "projects.title": "Nasze realizacje",
        "projects.subtitle": "Wybierz kategorię, aby filtrować",
        "projects.more": "Więcej",

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
        "footer.location": "Poznań, Polska",
        "footer.hours": "Pn-Pt: 8:00 - 18:00",

        "common.edit": "Edytuj",
        "common.remove": "Usuń",

        "areaValue": "Metraż",
        "notes": "Uwagi",
        "lengthValue": "Długość [m]",
        "heightValue": "Wysokość [m]",
        "gate": "Brama",
        "gateType": "Typ bramy",
        "automatic": "Automatyczna",
        "wicket": "Furtka",

        "material": "Materiał",
        "stairs": "Schody",
        "railing": "Barierka",
        "roof": "Zadaszenie",

        "type": "Typ",
        "people": "Liczba osób",

        "desc": "Opis projektu",
        "time": "Termin realizacji",




    },

    "en": {
        "common.edit": "Edit",
        "common.remove": "Remove",

        "areaValue": "Area",
        "notes": "Notes",

        "lengthValue": "Length",
        "heightValue": "Height",
        "gate": "Gate",
        "gateType": "Gate type",
        "automatic": "Automatic",
        "wicket": "Wicket gate",

        "material": "Material",
        "stairs": "Stairs",
        "railing": "Railing",
        "roof": "Roof",


        "type": "Type",
        "people": "Number of people",

        "desc": "Project description",
        "time": "Delivery time",


        "nav.home": "Home",
        "nav.pricing": "Pricing",
        "nav.projects": "Projects",
        "nav.about": "About us",
        "nav.contact": "Contact",

        "slide.one": "Construction?",
        "slide.two": "Renovation?",
        "slide.three": "No problem.",

        "pricing.summary.title": "Selected estimates",

        "pricing.info.main": "Here, you can get an estimated price range tailored to your needs.",
        "pricing.info.secondary": "You can fill in one or more calculators. After submitting the contact form below, you will receive a price range by email.",


        "pricing.title": "Pricing",
        "pricing.subtitle": "Select elements to get an estimated price range.",
        "pricing.submit": "Get a quote",
        "pricing.notes": "Notes",
        "pricing.surface": "Surface [m²]",
        "pricing.length": "Length [m]",
        "pricing.height": "Height [m]",
        "pricing.part_of_house": "This element is part of the timber house",
        "pricing.project.desc": "Project description",
        "pricing.sauna.type": "Sauna type",
        "remove": "Remove",

        "pricing.select": "-- select --",

        "pricing.houses.type.all_year": "All-year",
        "pricing.houses.type.seasonal": "Seasonal",
        "pricing.houses.type.rod": "ROD",

        "pricing.houses.wood.pine": "Pine",
        "pricing.houses.wood.spruce": "Spruce",
        "pricing.houses.wood.oak": "Oak",
        "pricing.houses.wood.larch": "Larch",

        "pricing.houses.state.raw": "Shell",
        "pricing.houses.state.dev": "Developer standard",



        "pricing.houses.type": "House type",
        "pricing.houses.surface": "Surface [m²]",
        "pricing.houses.wood_type": "Type of wood",
        "pricing.houses.state": "Implementation goal",
        "pricing.houses.notes":"Notes",

        "pricing.elev.type": "Facade type",
        "pricing.elev.type.wood": "Wooden",
        "pricing.elev.type.plaster": "Plastered",
        "pricing.elev.type.composite": "Composite",
        "pricing.elev.frame_house": "Part of the timber house",

        "pricing.fence.type": "Fence type",
        "pricing.fence.type.wood": "Wooden",
        "pricing.fence.type.metal": "Metal",
        "pricing.fence.type.composite": "Composite",
        "pricing.fence.gate": "Gate",
        "pricing.fence.gate_type": "Gate type",
        "pricing.fence.gate.sliding": "Sliding",
        "pricing.fence.gate.swing": "Swing",
        "pricing.fence.automatic": "Automatic",
        "pricing.fence.wicket": "Wicket gate",

        "pricing.terrace.material": "Material",
        "pricing.terrace.wood": "Wood",
        "pricing.terrace.composite": "Composite",
        "pricing.terrace.tiles": "Deck tiles",
        "pricing.terrace.stairs": "Stairs",
        "pricing.terrace.railing": "Railing",
        "pricing.terrace.roof": "Roof",

        "pricing.sauna.type": "Sauna type",
        "pricing.sauna.dry": "Dry (Finnish)",
        "pricing.sauna.steam": "Steam",
        "pricing.sauna.infra": "Infrared",
        "pricing.sauna.people": "Number of people",
        "pricing.sauna.1_2": "1–2 people",
        "pricing.sauna.2_4": "2–4 people",
        "pricing.sauna.4_6": "4–6 people",
        "pricing.sauna.6_plus": "More than 6",

        "pricing.project.info": "The project is created using professional CAD software (Autodesk Inventor).",
        "pricing.project.time": "Preferred delivery time",
        "pricing.project.7": "Up to 7 days",
        "pricing.project.14": "Up to 14 days",
        "pricing.project.21": "Up to 21 days",
        "pricing.project.30": "More than 30 days",

       



        "svc.houses": "Timber houses",
        "svc.elev": "Elevations",
        "svc.terraces": "Terraces",
        "svc.saunas": "Saunas",
        "svc.fences": "Fences",
        "svc.3d": "3D Projects",

        "projects.title": "Our projects",
        "projects.subtitle": "Choose a category to filter",
        "projects.more": "More",

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
        "footer.hours": "Mon-Fri: 8:00 AM - 6:00 PM",
    }
};
window.currentLang = 'pl';

/* ===============================
   APPLY TRANSLATIONS
=============================== */
function applyLang(lang) {
    window.currentLang = lang;

    document.querySelectorAll('[data-key]').forEach(node => {
        const key = node.dataset.key;
        const val = translations[lang]?.[key];
        if (typeof val === 'undefined') return;

        if (
            (node.tagName === 'INPUT' || node.tagName === 'TEXTAREA') &&
            'placeholder' in node
        ) {
            node.placeholder = val;
        } else {
            node.textContent = val;
        }
    });

    const langBtn = document.getElementById('lang-switch');
    if (langBtn) langBtn.textContent = lang === 'pl' ? 'EN' : 'PL';

    const hiddenLang = document.getElementById('contact-lang');
    if (hiddenLang) hiddenLang.value = lang;
}



/* ===============================
   INIT
=============================== */
document.addEventListener('DOMContentLoaded', () => {
    applyLang('pl');

    setTimeout(() => {
        const bubble = document.getElementById('contact-bubble');
        if (bubble) bubble.style.display = 'block';
    }, 5000);
});


/* ===============================
   LANGUAGE SWITCH
=============================== */
document.getElementById('lang-switch')?.addEventListener('click', () => {
    const newLang = window.currentLang === 'pl' ? 'en' : 'pl';
    applyLang(newLang);

    if (window.renderSummary) {
        window.renderSummary();
    }
});


/* ===============================
   PrettyPhoto bubble handling
=============================== */
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
<script src="js/calculator.js"></script>
</body>
</html>
