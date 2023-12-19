// Obtenez le bouton de langue et le menu déroulant
const languageButton = document.getElementById('languageButton');
const languageDropdown = document.getElementById('languageDropdown');

// Détectez la langue actuelle de l'utilisateur
const userLanguage = navigator.language.substring(0, 2); // Extrait la première partie (par exemple, "fr" pour "fr-FR")

// Parcourez les éléments du menu déroulant et remplacez le texte du bouton par le drapeau correspondant
const dropdownItems = languageDropdown.getElementsByTagName('a');
for (const item of dropdownItems) {
    if (item.getAttribute('data-lang') === userLanguage) {
        const img = item.querySelector('img');
        if (img) {
            const langText = item.textContent.replace(' ' + img.alt, ''); // Extrait le texte de langue
            languageButton.innerHTML = img.outerHTML + ' ' + langText; // Remplace le contenu du bouton
            break; // Sort de la boucle
        }
    }
}
