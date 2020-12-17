
// affiche/cache #fenetre en fonction de son etat actuel
$('#ajout').on('click',function (){
    var url = 'annuaire.html'
    var urlContact= 'contact.html'
    var contact =$.get(urlContact, function afficheContact(cont){
        $('#fenetre').html(cont);
    }    )
    $.get(url, function aff(annuaire){
    $('#fenetre').toggle();
    $('#fenetre').append(annuaire);
})
})
// Ne fait que cacher #fenetre 
$('#fermer').on('click', function () {
    $('#fenetre').hide();
})


//Crée une ligne avec les infos de la fenêtre si tous les champs sont remplis
var nbr = 0;
$('#envoyer').on('click',function () {
    if ($('#nom').val() != "" && $('#prenom').val() != "" && $('#tel').val() != "" && $('#mail').val() != "" ){
        nbr++;
        $('#tableau').append('<tr><td>'+ nbr+'</td><td>' + $('#nom').val() + '</td><td>' + $('#prenom').val() + '</td><td>' + $('#tel').val() + '</td><td>' + $('#mail').val() + '</td></tr>');
    }
    else{
        alert("Veuillez renseigner tous les champs")
        return false
    }
})

//retire la class actuel et met celle séléctionné 
$('button.bgblanc').click(function(){
   
  $('table').addClass('bgblanc').removeClass('bgnoir');
})
$('button.bgnoir').click(function(){
    $('table').addClass('bgnoir').removeClass('bgblanc');
})

//calcul et affiche les valeurs entrés dans les input #calc1 et #calc2 dans #resultatcalcul
$('#addition').click(function(){
    $('#resultatcalcul').html(parseInt( $('#calc1').val())+parseInt($('#calc2').val()));
})