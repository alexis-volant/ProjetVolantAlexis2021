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
        var photo = $.trim($('#nompilote').val());
        var idecurie = $.trim($('#idecurie').val());

        var parametre = 'idpilote=' + idpilote + '&abrv=' + abrv + '&nompilote=' + nompilote +'&prenom='+ prenom + '&nationalite='+
            nationalite + '&participationgp=' +participationgp +'&poleposition='+poleposition+'&podium='+podium+'&victoire='+victoire+'&titrechampion='+
            titrechampion+'&photo='+photo+'&idecurie='+idecurie;

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
        //alert(parametre);
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

    // tableau  supp commentaire
    $(".deletecomm").click( function()
    {
        var id_comm = $(this).attr("id");
        alert(id_comm);
        var parametre = 'id_comm=' + id_comm;
        //alert(parametre);

        $.ajax({
            type: 'GET',
            data: parametre,
            dataType: 'text',
            url: './lib/php/ajax/ajaxDeleteComm.php',
            succes: function (data) {
                console.log(data);
            }
        });
        setTimeout(function(){location.reload()}, 500);
    });


});