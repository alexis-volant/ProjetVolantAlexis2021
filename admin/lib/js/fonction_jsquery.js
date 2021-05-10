$(document).ready(function() {

//blur : perte de focus
//récup valeur de l'input
    $('#recup').blur(function () {
        var recup = $(this).val;
        alert(recup);
    });

// tableau pilote modif
        $('span[id]').click(function () {
            //text() : récupérer le contenu quand ce n'est pas un champ de formulaire
            //val() : contenu d'un champ de formulaire
            var valeur1 = $.trim($(this).text());
            //récup id et abrv
            var ident = $(this).attr("id");
            var name = $(this).attr("name");

            //alert("id = "+idpilote+" et col= "+ col); //comm
            $(this).blur(function () {
                var valeur2 = $.trim($(this).text());
                if (valeur1 != valeur2) {
                    //écriture param url
                    var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;

                    $.ajax({
                        type: 'GET',
                        data: parametre,
                        dataType: 'text',
                        url: './lib/php/ajax/ajaxUpdatePilote.php',
                        succes: function (data) {
                            console.log(data);
                        }
                    });
                }
        });
    });

    // tableau pilote supp
    $(".delete").click( function()
    {
        var idpilote = $(this).attr("id");
        var parametre = 'id=' + idpilote;
        //alert(parametre);

        $.ajax({
            type: 'GET',
            data: parametre,
            dataType: 'text',
            url: './lib/php/ajax/ajaxDeletePilote.php',
            succes: function (data) {
                console.log(data);

            }
        });
        setTimeout(function(){location.reload()}, 500);
    });


    //ajout pilote
    $("#inserer").click(function(){
        var idpilote = $.trim($('#idpilote').val());
        var abrv = $.trim($('#abrv').val());
        var nompilote = $.trim($('#nompilote').val());
        var prenom= $.trim($('#prenom').val());
        var nationalite = $.trim($('#nationalite').val());
        var participationgp = $.trim($('#participationgp').val());
        var poleposition = $.trim($('#poleposition').val());
        var podium = $.trim($('#podium').val());
        var victoire = $.trim($('#victoire').val());
        var titrechampion = $.trim($('#titrechampion').val());
        var idecurie = $.trim($('#idecurie').val());

        var parametre = 'idpilote=' + idpilote + '&abrv=' + abrv + '&nompilote=' + nompilote +'&prenom='+ prenom + '&nationalite='+
            nationalite + '&participationgp=' +participationgp +'&poleposition='+poleposition+'&podium='+podium+'&victoire='+victoire+'&titrechampion='+
            titrechampion+'&idecurie='+idecurie;
        alert(parametre);
        $.ajax({
            type: 'POST',
            data: parametre,
            datatype: 'json',
            url: './lib/php/ajax/ajaxAjoutPilote.php',
            success: function(data){
                console.log(data);

                }
        });
        setTimeout(function(){location.reload()}, 500);
    });


    //ajout client
    $("#inscription").click(function(){
        var nom = $.trim($('#nom').val());
        var prenom = $.trim($('#prenom').val());
        var login = $.trim($('#login').val());
        var pwd= $.trim($('#password').val());

        var parametre = 'nom=' + nom + '&prenom=' + prenom + '&login=' +login+ '&pwd=' +pwd ;
        //alert(parametre);
        $.ajax({
            type: 'POST',
            data: parametre,
            datatype: 'json',
            url: './admin/lib/php/ajax/ajaxInscription.php',
            success: function(data){
                console.log(data);

            }
        });
        setTimeout(function(){location.reload()}, 1000);
    });

    //ajout commentaire
    $("#envoyer").click(function(){
        var pseudo =$.trim($('#pseudo').val());
        var comm = $.trim($('#comm').val());
        var id_ecurie = $.trim($('#id_ecurie').val());


        var parametre = 'pseudo=' + pseudo + '&comm=' + comm + '&id_ecurie=' +id_ecurie;
        alert(parametre);
        $.ajax({
            type: 'POST',
            data: parametre,
            datatype: 'json',
            url: './admin/lib/php/ajax/ajaxCommentaire.php',
            success: function(data){
                console.log(data);

            }
        });
        setTimeout(function(){location.reload()}, 1000);
    });


//$('#submit_id').remove();

    /*$('#id').blur(function(){
        //prelevement de la valeur entrée dans l'input
        var id= $(this).val(); //val() : uniquement pour input
        alert("id : "+id);
        var parametre = "idpilote="+id;

        $.ajax({
            type: 'GET',
            data: parametre,
            datatype: 'json',
            url: './admin/lib/php/ajax/ajaxDetailPilote.php',
            success: function (data) {
                //console.log(data);
                $('#id_produit').html("<br><br>" + data[0].nom_produit + "<br><br>" + data[0].description);
                $('#image_produit').html('<img src="admin/images/'+data[0].photo+'" alt="Illustration">');
            }

        });
    });

    $('#choix_produit').change(function (){
        //récup la valeur de l'attribut name (php)
        var attribut = $(this).attr('name');
        //alert("id_produit : "+attribut);
        var id =$(this).val();
        var parametre ="id_produit="+id;
        $.ajax({
            type: 'GET',
            data: parametre,
            datatype: 'json',
            url: './admin/lib/php/ajax/ajaxDetailProduit.php',
            success: function (data) {
                //console.data(data);
                $('#id_produit').html("<br><br>" + data[0].nom_produit + "<br><br>" + data[0].description);
                $('#image_produit').html('<img src="admin/images/'+data[0].photo+'" alt="Illustration">');
            }

        });



    });*/

});