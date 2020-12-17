//création du menu
$.get('menu.json').done(function (datamenu) {
    //On récupère les lien à mettre dans le menu

    //création de la navbar
    $("body").prepend('<nav id="navbar" class="navbar navbar-expand-md bg-light navbar-light shadow">' +
        '<a class="navbar-brand" href="#"><img id="logo" src="img/justplay.fw.png" alt="Logo"></a>' +
        '<ul class="navbar-nav" id="menu"></ul></div></div></nav>');

    $.each(datamenu, function (key, info) {
        //affiche chaque lien contenue dans le fichier
        $("#menu").append('<li class="nav-item" ><a href="#" id="menu' + info.nom + '"  data-toggle="" data-target="">' + info.nom + '</a></li>');
    })
    //On remplit les attribues de chaque lien du menu avec les informations correspondantes
    $("#menuaccueil").attr("href", "index.html")
    $("#menuinscription").attr("href", "inscription.html")
    $("#menuconnexion").attr("data-toggle", "modal")
    $("#menuconnexion").attr("data-target", "#myModal")

    //Lorsqu'on clique sur le lien connexion du menu
    $("#menuconnexion").on('click', modalConnexion())

});
//On met le formulaire de connexion dans le modal
function modalConnexion() {
    changeModalTitre("Connexion")
    changeModalBody('<form action="/action_page.php">' +
        '<div class="form-group"> <label for="email">Adresse Email:</label>' +
        '<input type="email" class="form-control" placeholder=" " id="email"></div>' +
        '<div class="form-group"> <label for="pwd">Mot de Passe:</label>' +
        '<input type="password" class="form-control" placeholder=" " id="pwd">  </div>' +
        '<div class="form-group form-check"><label class="form-check-label">' +
        '<input class="form-check-input" type="checkbox"> Se souvenir de moi </label> </div> </form > ')
    changeModalFooter('<button type="button" class="btn btn-info" data-dismiss="modal">Se Connecter</button>')
}

function getKey(elem) {
    return $(elem).attr('key')
}



//Fonction de modification du modal
function changeModalTitre(titre) {
    $('.modal-title').html(titre);
}
function changeModalBody(titre) {
    $('.modal-body').html(titre);
}
function changeModalFooter(titre) {
    $('.modal-footer').html(titre);
}
//Fonction d'ajoute de slide au carousel
function ajoutCarousel(data, film) {
    $('#carouselContent').append('<div class="carousel-item "><img src="' + data[film].img + '" alt="' + data[film].titre + '">' +
        '<div class="carousel-caption"><h2>' + data[film].titre + '</h2><p>' + data[film].catégorie + '</p></div> </div>')
}
//crée un nombre au hazard entre 0 et la longueur de l'entrée
function nombreAuHazard(data) {
    const nbr = Math.floor(Math.random() * data.length);
    return nbr
}




//récupération du fichier avec les informations des films
$.get('film.json').done(function (datafilm) {
    
    //Récupération des films à mettre dans le carousel
     for( let z=0;z<1; z=z){
        var slide1 = nombreAuHazard(datafilm);
        var slide2 = nombreAuHazard(datafilm);
        var slide3 = nombreAuHazard(datafilm);
        // On pioche 3 films au hazard  
        if (slide1 != slide2 && slide1!= slide3 && slide2 != slide3) {
            //Si il n'y a pas de doublon, on continue
            z++;
            console.log(slide1,slide2,slide3)
        }
        else { }
    }
    //Ajout les slides dans le carousel
    // on insère le premier slide
    $('#carouselContent').append('<div class="carousel-item active"><img  src="' + datafilm[slide1].img + '" alt="' + datafilm[slide1].titre + '">' +
        '<div class="carousel-caption"><h2>' + datafilm[slide1].titre + '</h2><p>' + datafilm[slide1].catégorie + '</p></div> </div>');
    // on ajoute les deux slides restants
    ajoutCarousel(datafilm, slide2);
    ajoutCarousel(datafilm, slide3);

    // Création du top films       
    $.each(datafilm, function (key, film) {
        let classement = key++;
        //Créé une carte avec les informations de chaque films
        $("#topfilms").append('<div key="' + classement + '" class="card bg-white" id="cartefilm">' +
            '<div class="card-header box-shadow text-light cle"><h4>#' + key + '</h4></div>' +
            '<img class="card-img-top shadow" src="' + film.img + '" alt="' + film.titre + '">' +
            '<div class="card-body"><h4 class="card-title">' + film.titre + '</h4></div>' +
            '<div class="card-footer"><p class="card-text">' + film.catégorie + '</p>' +
            '<button class="btn btn-block border bg-light" data-toggle="modal" data-target="#myModal"  >Voir film</button></div></div>');
    })

    //affiche le film cliqué dans le modal
    $(".card").on('click', function () {
        //on récupère le numéro du film que l'on veut       
        const key = getKey(this);
        //on incorpore les informations du films correspondants dans les différentes parties du modal
        changeModalTitre(datafilm[key].titre);
        changeModalBody("<img src='"+datafilm[key].img+"' id='carteimg' class='border shadow' /><div id='infofilm'><div><p class='text-center font-weight-bold underline mb-0'>Durée:</p><p class='text-center '>" + datafilm[key].durée + "</p></div>" +
            "<div><p class='text-center font-weight-bold underline mb-0' >Date de Sortie:</p><p class='text-center mb-0'>" + datafilm[key].sortie + "</p></div></div>");
        changeModalFooter('<button type="button" class="btn btn-info" onclick="modalConnexion()">Regarder</button>');
    })
})





//AFFICHAGE DU FOOTER
$.get('footer.json').done(function (datafooter) {
    $('body').append('<footer class="bg-light border-top align-self-end" ><ul id="footer"></ul></footer>')
    $.each(datafooter, function (key, info) {
        $('#footer').append('<li id="footer' + info.nom + '"><a href="#" id="footer' + key + '"  data-toggle="modal" data-target="#myModal">' + info.nom + '</a></ul>')
    })

    $("#footer0").on('click', function () {
        //Lorsqu'uon clique sur le lien A propos du footer
        //On affiche les informations de l'entreprise dans le modal
        changeModalTitre("À propos de JUST PLAY");
        changeModalBody("<p>JUST PLAY est une entreprise de distribution des vidéos situé à Noisy-le-Grand.</p><p>Elle a pour projet de distribuer des films, des documentaires et des séries en streaming via internet  VOD.</p>");
        changeModalFooter('<button type="button" class="btn btn-info" data-dismiss="modal">Fermer</button>')
    })
    $("#footer1").on('click', function () {
        //Lorsqu'uon clique sur le lien A propos du footer
        //On affiche les mentions légales dans le modal
        changeModalTitre("Mention Légales")
        changeModalBody("<p><span class='font-weight-bold'>Propriétaire </span>: MORLE Lucas | Individuel | morlelucas@mail.com | 07776900XX | 13 rue du ******</p><p><span class='font-weight-bold'>Hebergeur</span>: MORLE Lucas | 13 rue du ******</p>")
        changeModalFooter('<button type="button" class="btn btn-info" data-dismiss="modal">Fermer</button>')
    })
    $("#footer2").on('click', function () {
        //Lorsqu'on clique sur le lien contact du footer
        //On met le formulaire de contact dans le modal
        changeModalTitre("Contact");
        changeModalBody('<form action="/action_page.php">' +
            '<div class="form-group"> <label  for="nom">Nom*:</label>' +
            '<input type="nom" class="form-control" placeholder=" " id="nom"></div>' +
            '<div class="form-group"> <label  for="prenom">Prénom*:</label>' +
            '<input type="prenom" class="form-control" placeholder=" " id="prenom">  </div>' +
            '<div class="form-group"><label for="motif">Motif*:</label><br><select id="motif-select">' + '<option value="">-Choisissez un motif-</option>' + '<option value="réclamation">Réclamation</option>' +
            '<option value="suggestion">Suggestion</option><option value="emplois">Emplois</option><option value="autre">Autre</option></select> </div>' +
            '<div class="form-group"> <label  for="pwd">Message*:</label>' +
            '<input type="text-box" class="form-control" R=" " id="message">  </div> ' +
            '<div class="form-group"><p class="underline">Adresse:</p><p>15 Rue de l\'Université, 93160 Noisy-le-Grand</p><img style="width:100%;" class="border" src="img/carte.PNG" /></div> </form > ')
        changeModalFooter('<button type="button" class="btn btn-info" data-dismiss="modal">Envoyer</button>')

    })

});





// TARIF POUR LA PAGE INSCRIPTION
$.get("tarif.json").done(function (dataforfait) {
    //On récupère puis affiche chaque tarif avec les informations correspondantes dans des cartes
    $.each(dataforfait, function (key, forfait) {
        $("#tarifcarte").append('<div class="card " id="forfaitcarte"> <div class="card-header"><h4>' + forfait.nom + '</h4></div>' +
            '<div class="card-body"><p>-' + forfait.ecran + '</p>' +
            '<p class="font-weight-bold"> ' + forfait.prix + '€ </p></div>' +
            '<div class="card-footer bg-white"><button id="forminscription" key="' + key + '" class="btn border bg-light" data-toggle="modal" data-target="#myModal"  >Acheter</button></div></div>');
    })
    //affiche  le formulaire d'inscription avec le prix du forfait séléctionné
    $(".card-footer>button").on('click', function () {
        //on récupère le forfait
        const key = getKey(this);
        //change les parties du modal
        changeModalTitre("Inscription");
        changeModalBody('<form action="/action_page.php">' +
            '<div class="form-group"> <label for="nom">Nom:</label>' +
            '<input type="nom" class="form-control" placeholder=" " id="email"></div>' +
            '<div class="form-group"> <label for="prenom">Prénom:</label>' +
            '<input type="prenom" class="form-control" placeholder=" " id="prenom">  </div>' +
            '<div class="form-group"> <label for="email">Adresse Email:</label>' +
            '<input type="email" class="form-control" placeholder=" " id="email"></div>' +
            '<div class="form-group"> <label for="pwd">Mot de Passe:</label>' +
            '<input type="password" class="form-control" placeholder=" " id="pwd">  </div>' +
            '<div class="form-group"> <label for="pwd">Prix à payer:</label>' +
            '<span class=" font-weight-bold">' + dataforfait[key].prix + '€</span>  </div>');
        changeModalFooter('<button type="button" class="btn btn-info" data-dismiss="modal">S\'inscrire</button>')
    })
})
