let currentLanguage = 'en'; // default language

const loadLanguage = (lang) => {
    fetch(`./lang/${lang}.json`)
        .then(response => response.json())
        .then(data => {
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                el.innerText = data[key] || key;
            });
        });
};

const changeLanguage = (lang) => {
    currentLanguage = lang;
    loadLanguage(lang);
};

document.addEventListener('DOMContentLoaded', () => {
    loadLanguage(currentLanguage);

    document.querySelectorAll('[data-lang]').forEach(el => {
        el.addEventListener('click', () => {
            changeLanguage(el.getAttribute('data-lang'));
        });
    });
});
