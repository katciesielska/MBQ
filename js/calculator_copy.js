document.addEventListener('DOMContentLoaded', () => {

    /* ===============================
       HELPERS
    =============================== */
    function blockENotation(input) {
        input.addEventListener('keydown', e => {
            if (['e', 'E', '+', '-'].includes(e.key)) e.preventDefault();
        });
    }

    /* ===============================
       SERVICE → TITLE MAP
    =============================== */
    const serviceTitleKeys = {
        domy_szkieletowe: 'svc.houses',
        elewacje: 'svc.elev',
        tarasy: 'svc.terraces',
        sauny: 'svc.saunas',
        ogrodzenie: 'svc.fences',
        projekty_3d: 'svc.3d'
    };

    /* ===============================
       DOM / STATE
    =============================== */
    const calculatorsContainer = document.getElementById('service-calculators');
    const serviceBoxes = document.querySelectorAll('.service-box');
    const summaryBox = document.getElementById('quote-summary');
    const summaryList = document.getElementById('quote-summary-list');

    const quotes = {};
    const getSaved = key => quotes[key]?.data || {};

    /* ===============================
       SERVICE CLICK
    =============================== */
    serviceBoxes.forEach(box => {
        box.addEventListener('click', e => {
            e.preventDefault();
            e.stopPropagation();
            openCalculator(box.dataset.folder);
        });
    });

    function openCalculator(key) {
        calculatorsContainer.style.display = 'block';
        calculatorsContainer.innerHTML = '';

        const map = {
            domy_szkieletowe: houseCalculator,
            elewacje: elevationCalculator,
            tarasy: terraceCalculator,
            sauny: saunaCalculator,
            ogrodzenie: fenceCalculator,
            projekty_3d: project3DCalculator
        };

        const calc = map[key]?.(key);
        if (!calc) return;

        calculatorsContainer.appendChild(calc);
        if (typeof applyLang === 'function') applyLang(window.currentLang);
        //calc.scrollIntoView({ behavior: 'smooth', block: 'start' });
        scrollToPricing();

    }

    /* ===============================
       SAVE / SUMMARY
    =============================== */
    function saveQuote(key, labelKey, data) {
        quotes[key] = { labelKey, data };
        renderSummary();
        calculatorsContainer.style.display = 'none';
    }

    function renderSummary() {
    summaryList.innerHTML = '';
    const keys = Object.keys(quotes);

    if (!keys.length) {
        summaryBox.style.display = 'none';
        return;
    }

    summaryBox.style.display = 'block';

    keys.forEach(key => {
        const { labelKey } = quotes[key];
        const li = document.createElement('li');

        li.innerHTML = `
            <strong data-key="${labelKey}"></strong>
            <div class="summary-actions">
                <button class="edit-btn" data-key="common.edit"></button>
                <button class="remove-btn" data-key="common.remove"></button>
            </div>
        `;

        li.querySelector('.edit-btn').onclick = () => openCalculator(key);
        li.querySelector('.remove-btn').onclick = () => {
            delete quotes[key];
            renderSummary();
        };

        summaryList.appendChild(li);
    });

    if (typeof applyLang === 'function') {
        applyLang(window.currentLang);
    }
}



    window.renderSummary = renderSummary;

    /* ===============================
       CALCULATORS
    =============================== */
    function houseCalculator(key) {
    const s = getSaved(key);
    const w = document.createElement('div');
    w.className = 'contact-form-simple';

    w.innerHTML = `
        <h4 class="calculator-title" data-key="${serviceTitleKeys[key]}">Domy szkieletowe</h4>

        <label data-key="pricing.houses.type">Typ domu</label>
        <select id="type" class="form-control">
            <option value="" data-key="pricing.select">— wybierz —</option>
            <option value="all_year" data-key="pricing.houses.type.all_year">Całoroczny</option>
            <option value="seasonal" data-key="pricing.houses.type.seasonal">Sezonowy</option>
            <option value="rod" data-key="pricing.houses.type.rod">ROD</option>
        </select>

        <label data-key="pricing.houses.surface">Powierzchnia</label>
        <input
            id="area"
            type="number"
            class="form-control"
            value="${s.areaValue || ''}"
        >

        <label data-key="pricing.houses.wood_type">Typ drewna</label>
        <select id="wood" class="form-control">
            <option value="" data-key="pricing.select">— wybierz —</option>
            <option value="pine" data-key="pricing.houses.wood.pine">Sosna</option>
            <option value="spruce" data-key="pricing.houses.wood.spruce">Świerk</option>
            <option value="oak" data-key="pricing.houses.wood.oak">Dąb</option>
            <option value="larch" data-key="pricing.houses.wood.larch">Modrzew</option>
        </select>

        <label data-key="pricing.houses.state">Stan realizacji</label>
        <select id="state" class="form-control">
            <option value="" data-key="pricing.select">— wybierz —</option>
            <option value="raw" data-key="pricing.houses.state.raw">Stan surowy</option>
            <option value="dev" data-key="pricing.houses.state.dev">Stan deweloperski</option>
        </select> <br> 

        
        <button type="button" class="btn-contact-submit" data-key="pricing.submit">
            Wyślij
        </button>
    `;

    // przywracanie zapisanych wartości
    w.querySelector('#type').value = s.type || '';
    w.querySelector('#wood').value = s.wood || '';
    w.querySelector('#state').value = s.state || '';

    // zapis
    w.querySelector('button').onclick = () => {
        saveQuote(key, serviceTitleKeys[key], {
            type: w.querySelector('#type').value,
            areaValue: w.querySelector('#area').value,
            wood: w.querySelector('#wood').value,
            state: w.querySelector('#state').value
        });
    };

    blockENotation(w.querySelector('#area'));
    return w;
}

    

    function elevationCalculator(key) {
    const s = getSaved(key);
    const w = document.createElement('div');
    w.className = 'contact-form-simple';

    w.innerHTML = `
        <h4 class="calculator-title" data-key="${serviceTitleKeys[key]}">Elewacje</h4>

        <label data-key="pricing.elev.type">Typ elewacji</label>
        <select id="type" class="form-control">
            <option value="" data-key="pricing.select">— wybierz —</option>
            <option value="wood" data-key="pricing.elev.type.wood">Drewniana</option>
            <option value="plaster" data-key="pricing.elev.type.plaster">Tynkowa</option>
            <option value="composite" data-key="pricing.elev.type.composite">Kompozytowa</option>
        </select>

        <label data-key="pricing.surface">Powierzchnia</label>
        <input
            id="area"
            type="number"
            class="form-control"
            value="${s.areaValue || ''}"
        >

        

        <br>
        <button
            type="button"
            class="btn-contact-submit"
            data-key="pricing.submit"
        >
            Wyślij
        </button>
    `;

    // przywracanie zapisanych wartości
    w.querySelector('#type').value = s.type || '';
    
    // obsługa zapisu
    w.querySelector('button').onclick = () => {
        saveQuote(key, serviceTitleKeys[key], {
            type: w.querySelector('#type').value,
            areaValue: w.querySelector('#area').value
        });
    };

    blockENotation(w.querySelector('#area'));
    return w;
}

function fenceCalculator(key) {
    const s = getSaved(key);
    const w = document.createElement('div');
    w.className = 'contact-form-simple';

    w.innerHTML = `
        <h4 class="calculator-title" data-key="${serviceTitleKeys[key]}">Ogrodzenia</h4>

        <label data-key="pricing.fence.type">Typ ogrodzenia</label>
        <select id="type" class="form-control">
            <option value="" data-key="pricing.select">— wybierz —</option>
            <option value="wood" data-key="pricing.fence.type.wood">Drewniane</option>
            <option value="metal" data-key="pricing.fence.type.metal">Metalowe</option>
            <option value="composite" data-key="pricing.fence.type.composite">Kompozytowe</option>
        </select>

        <label data-key="pricing.length">Długość (m)</label>
        <input
            id="length"
            type="number"
            class="form-control"
            value="${s.lengthValue || ''}"
        >

        <label data-key="pricing.height">Wysokość (m)</label>
        <input
            id="height"
            type="number"
            class="form-control"
            value="${s.heightValue || ''}"
        >

        <label>
            <input
                type="checkbox"
                id="gate"
                ${s.gate ? 'checked' : ''}
            >
            <span data-key="pricing.fence.gate">Brama</span>
        </label>

        <div id="gate-options" style="display:none; margin-left:20px;">

        <label data-key="pricing.fence.gate_type">Typ bramy</label>
        <select id="gateType" class="form-control">
            <option value="" data-key="pricing.select">— wybierz —</option>
            <option value="sliding" data-key="pricing.fence.gate.sliding">Przesuwna</option>
            <option value="swing" data-key="pricing.fence.gate.swing">Skrzydłowa</option>
        </select>

    <label>
        <input
            type="checkbox"
            id="automatic"
            ${s.automatic ? 'checked' : ''}
        >
        <span data-key="pricing.fence.automatic">Automatyczna</span>
    </label>

</div>


        <label>
            <input
                type="checkbox"
                id="wicket"
                ${s.wicket ? 'checked' : ''}
            >
            <span data-key="pricing.fence.wicket">Furtka</span>
        </label>

        <button
            type="button"
            class="btn-contact-submit"
            data-key="pricing.submit"
        >
            Wyślij
        </button>
    `;

    // przywracanie zapisanych wartości
    w.querySelector('#type').value = s.type || '';
    w.querySelector('#gateType').value = s.gateType || '';

    // zapis danych
    w.querySelector('button').onclick = () => {
        saveQuote(key, serviceTitleKeys[key], {
            type: w.querySelector('#type').value,
            lengthValue: w.querySelector('#length').value,
            heightValue: w.querySelector('#height').value,
            gate: w.querySelector('#gate').checked,
            gateType: w.querySelector('#gateType').value,
            automatic: w.querySelector('#automatic').checked,
            wicket: w.querySelector('#wicket').checked
        });
    };

    blockENotation(w.querySelector('#length'));
    blockENotation(w.querySelector('#height'));

    return w;
}

function terraceCalculator(key) {
    const s = getSaved(key);
    const w = document.createElement('div');
    w.className = 'contact-form-simple';

    w.innerHTML = `
        <h4 class="calculator-title" data-key="${serviceTitleKeys[key]}">Tarasy</h4>

        <label data-key="pricing.terrace.material">Materiał</label>
        <select id="mat" class="form-control">
            <option value="" data-key="pricing.select">— wybierz —</option>
            <option value="wood" data-key="pricing.terrace.wood">Drewno</option>
            <option value="composite" data-key="pricing.terrace.composite">Kompozyt</option>
            <option value="tiles" data-key="pricing.terrace.tiles">Płyty tarasowe</option>
        </select>

        <label data-key="pricing.surface">Powierzchnia</label>
        <input
            id="area"
            type="number"
            class="form-control"
            value="${s.areaValue || ''}"
        >

        <label>
            <input
                type="checkbox"
                id="stairs"
                ${s.stairs ? 'checked' : ''}
            >
            <span data-key="pricing.terrace.stairs">Schody</span>
        </label>

        <label>
            <input
                type="checkbox"
                id="railing"
                ${s.railing ? 'checked' : ''}
            >
            <span data-key="pricing.terrace.railing">Barierka</span>
        </label>

        <label>
            <input
                type="checkbox"
                id="roof"
                ${s.roof ? 'checked' : ''}
            >
            <span data-key="pricing.terrace.roof">Zadaszenie</span>
        </label>

        <button
            type="button"
            class="btn-contact-submit"
            data-key="pricing.submit"
        >
            Wyślij
        </button>
    `;

    // przywracanie zapisanych wartości
    w.querySelector('#mat').value = s.material || '';

    // zapis danych
    w.querySelector('button').onclick = () => {
        saveQuote(key, serviceTitleKeys[key], {
            material: w.querySelector('#mat').value,
            areaValue: w.querySelector('#area').value,
            stairs: w.querySelector('#stairs').checked,
            railing: w.querySelector('#railing').checked,
            roof: w.querySelector('#roof').checked
        });
    };

    blockENotation(w.querySelector('#area'));
    return w;
}


function saunaCalculator(key) {
    const s = getSaved(key);
    const w = document.createElement('div');
    w.className = 'contact-form-simple';

    w.innerHTML = `
        <h4 class="calculator-title" data-key="${serviceTitleKeys[key]}">Sauny</h4>

        <label data-key="pricing.sauna.type">Typ sauny</label>
        <select id="type" class="form-control">
            <option value="" data-key="pricing.select">— wybierz —</option>
            <option value="dry" data-key="pricing.sauna.dry">Sucha (fińska)</option>
            <option value="steam" data-key="pricing.sauna.steam">Parowa</option>
            <option value="infra" data-key="pricing.sauna.infra">Infrared</option>
        </select>

        <label data-key="pricing.sauna.people">Liczba osób</label>
        <select id="people" class="form-control">
            <option value="" data-key="pricing.select">— wybierz —</option>
            <option value="1_2" data-key="pricing.sauna.1_2">1–2 osoby</option>
            <option value="2_4" data-key="pricing.sauna.2_4">2–4 osoby</option>
            <option value="4_6" data-key="pricing.sauna.4_6">4–6 osób</option>
            <option value="6_plus" data-key="pricing.sauna.6_plus">Powyżej 6 osób</option>
        </select>

        <label data-key="pricing.surface">Powierzchnia</label>
        <input
            id="area"
            type="number"
            class="form-control"
            value="${s.areaValue || ''}"
        > <br>

        <button
            type="button"
            class="btn-contact-submit"
            data-key="pricing.submit"
        >
            Wyślij
        </button>
    `;

    // przywracanie zapisanych wartości
    w.querySelector('#type').value = s.type || '';
    w.querySelector('#people').value = s.people || '';

    // zapis danych
    w.querySelector('button').onclick = () => {
        saveQuote(key, serviceTitleKeys[key], {
            type: w.querySelector('#type').value,
            people: w.querySelector('#people').value,
            areaValue: w.querySelector('#area').value
        });
    };

    blockENotation(w.querySelector('#area'));
    return w;
}

    
function project3DCalculator(key) {
    const s = getSaved(key);
    const w = document.createElement('div');
    w.className = 'contact-form-simple';

    w.innerHTML = `
        <h4 class="calculator-title" data-key="${serviceTitleKeys[key]}">Projekty 3D</h4>

        <p data-key="pricing.project.info">
            Projekt wykonywany w profesjonalnym oprogramowaniu CAD (Autodesk Inventor).
        </p>

        <label data-key="pricing.project.desc">Opis projektu</label>
        <textarea
            id="desc"
            class="form-control"
        >${s.desc || ''}</textarea>

        <label data-key="pricing.project.time">Preferowany termin realizacji</label>
        <select id="time" class="form-control">
            <option value="" data-key="pricing.select">— wybierz —</option>
            <option value="7" data-key="pricing.project.7">Do 7 dni</option>
            <option value="14" data-key="pricing.project.14">Do 14 dni</option>
            <option value="21" data-key="pricing.project.21">Do 21 dni</option>
            <option value="30" data-key="pricing.project.30">Powyżej 30 dni</option>
        </select> <br>

        <button
            type="button"
            class="btn-contact-submit"
            data-key="pricing.submit"
        >
            Wyślij
        </button>
    `;

    // przywracanie zapisanych wartości
    w.querySelector('#time').value = s.time || '';

    // zapis danych
    w.querySelector('button').onclick = () => {
        saveQuote(key, serviceTitleKeys[key], {
            desc: w.querySelector('#desc').value,
            time: w.querySelector('#time').value
        });
    };

    return w;
}

function scrollToPricing() {
    const el = document.getElementById('about');
    if (!el) return;

    const yOffset = -70; // wysokość górnego menu
    const y = el.getBoundingClientRect().top + window.pageYOffset + yOffset;

    window.scrollTo({
        top: y,
        behavior: 'smooth'
    });
}

/* ===============================
   SEND QUOTES WITH CONTACT FORM
=============================== */
const contactForm = document.getElementById('contact-form');
const quotesInput = document.getElementById('quotes-data');

if (contactForm && quotesInput) {
    contactForm.addEventListener('submit', () => {
        quotesInput.value = JSON.stringify(quotes);
    });
}

    

});
