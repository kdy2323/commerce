$(document).ready(function () {
    $(".btn-toggle-desc").click(function () {
        const btn = $(this);
        const desc = btn.siblings(".desc-complete");

        desc.slideToggle(300, function () {
            btn.text(desc.is(":visible") ? "Voir moins" : "Voir plus");
        });
    });

    $(".ligne-produit").hover(function () {
        $(this).css("background-color", "#f0f0f0");
    }, function () {
        $(this).css("background-color", "");
    });
});



$(document).ready(function () {
    // Affichage du prix max
    $('#filtre-prix').on('input', function () {
        $('#valeur-prix').text($(this).val() + ' €');
        filtrerProduits();
    });

    // Filtre par catégorie
    $('#filtre-categorie').change(function () {
        filtrerProduits();
    });

    function filtrerProduits() {
        let categorie = $('#filtre-categorie').val();
        let prixMax = parseFloat($('#filtre-prix').val());

        $('.ligne-produit').each(function () {
            let prix = parseFloat($(this).data('prix'));
            let cat = $(this).data('categorie').toString();

            let afficher = true;

            if (categorie !== "toutes" && cat !== categorie) {
                afficher = false;
            }

            if (prix > prixMax) {
                afficher = false;
            }

            $(this).toggle(afficher);
        });
    }
});
