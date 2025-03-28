$(document).ready(function(){

    $('div[id_dep]').hover(function(){
        let id_dep = $(this).attr('id_dep');
        console.log("id_dep "+id_dep);
        let url = `id_departement=${id_dep}`
        console.log("id_dep backticks : ",url)
        $.ajax({
            type: "GET",
            dataType: "json",
            data: url,
            url: "src/php/ajax/ajax_get_image_responsable.php",
            success: function(data){ //data = données récupérées de la BD
                console.log(data[0].image_responsable)
                $('#responsable').html(
                    '<img src="assets/images/admin/'+data[0].image_responsable+'" alt="image du responsable">',

                )
            }
        })

    })

})