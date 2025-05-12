$(document).ready(function () {
    $('#searchButton').click(function () {
        var searchQuery = $('#searchInput').val();

        if (searchQuery.trim() != "") {
            $.ajax({
                url: '/admin/src/ajax/ajax_search.php',  
                method: 'GET',
                data: { nom: searchQuery }, 
                success: function (data) {
                    $('tbody').html(data);
                },
                error: function (xhr, status, error) {
                    console.error("Erreur lors de la récupération des produits : " + error);
                }
            });
        } else {
            alert("Veuillez entrer un nom de produit.");
        }
    });

});
