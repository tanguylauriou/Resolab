 // Attend que le DOM soit complètement chargé
 document.addEventListener('DOMContentLoaded', function() {
    // Récupère tous les boutons avec la classe "filter-button"
    var buttons = document.querySelectorAll('.filter-button');
    var buttonsPub = document.querySelectorAll('.filter-button-pub');
    // Parcourt tous les boutons
    buttons.forEach(function(button) {
        // Vérifie si le bouton a l'attribut data-filter égal à "all"
        if (button.getAttribute('data-filter') === 'tous') {
            // Ajoute la classe "active" uniquement au bouton "Tous"
            button.classList.add('active');
        }
    });
    buttonsPub.forEach(function(button) {
        // Vérifie si le bouton a l'attribut data-filter égal à "all"
        if (button.getAttribute('data-filter') === 'tous') {
            // Ajoute la classe "active" uniquement au bouton "Tous"
            button.classList.add('active');
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const filterButtonsPub = document.querySelectorAll('.filter-button-pub');
    const filterButtonsType = document.querySelectorAll('.filter-button');
    const livrables = document.querySelectorAll('.livrable');
    let activePublicFilter = 'tous';
    let activeTypeFilter = 'tous';

    filterButtonsPub.forEach(function (button) {
        button.addEventListener('click', function () {
            // Désactiver tous les boutons de filtre public
            filterButtonsPub.forEach(function (btn) {
                btn.classList.remove('active');
            });

            // Activer le bouton sélectionné
            button.classList.add('active');

            activePublicFilter = button.getAttribute('data-filter');

            // Filtrer les livrables en fonction des boutons actifs
            livrables.forEach(function (livrable) {
                const publicCibleElement = livrable.querySelector('.public-cible');
                const publicCible = publicCibleElement ? publicCibleElement.textContent.replace('#', '') : '';
                const publicCiblesLivrable = publicCible.split(', ');

                const typeDocumentElement = livrable.querySelector('.type-document');
                const typeDocument = typeDocumentElement ? typeDocumentElement.textContent.replace('#', '') : '';
                const typeDocumentLivrable = typeDocument.split(', ');

                if (
                    (activePublicFilter === 'tous' || publicCiblesLivrable.includes(activePublicFilter)) &&
                    (activeTypeFilter === 'tous' || typeDocumentLivrable.includes(activeTypeFilter))
                ) {
                    livrable.style.display = 'block';
                } else {
                    livrable.style.display = 'none';
                }
            });
        });
    });

    filterButtonsType.forEach(function (button) {
        button.addEventListener('click', function () {
            // Désactiver tous les boutons de filtre type
            filterButtonsType.forEach(function (btn) {
                btn.classList.remove('active');
            });

            // Activer le bouton sélectionné
            button.classList.add('active');

            activeTypeFilter = button.getAttribute('data-filter');

            // Filtrer les livrables en fonction des boutons actifs
            livrables.forEach(function (livrable) {
                const publicCibleElement = livrable.querySelector('.public-cible');
                const publicCible = publicCibleElement ? publicCibleElement.textContent.replace('#', '') : '';
                const publicCiblesLivrable = publicCible.split(', ');

                const typeDocumentElement = livrable.querySelector('.type-document');
                const typeDocument = typeDocumentElement ? typeDocumentElement.textContent.replace('#', '') : '';
                const typeDocumentLivrable = typeDocument.split(', ');

                if (
                    (activePublicFilter === 'tous' || publicCiblesLivrable.includes(activePublicFilter)) &&
                    (activeTypeFilter === 'tous' || typeDocumentLivrable.includes(activeTypeFilter))
                ) {
                    livrable.style.display = 'block';
                } else {
                    livrable.style.display = 'none';
                }
            });
        });
    });
});
