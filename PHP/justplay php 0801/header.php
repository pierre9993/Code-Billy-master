<script>
    //création du menu
$.get('menu.json').done(function (datamenu) {
    //On récupère les lien à mettre dans le menu

    //création de la navbar
    $("body").prepend('<nav id="navbar" class="navbar navbar-expand-md bg-light navbar-light shadow">' +
        '<a class="navbar-brand" href="#"><img id="logo" src="img/justplay.fw.png" alt="Logo"></a>' +
        '<ul class="navbar-nav" id="menu"></ul></div></div></nav>');
    $.each(datamenu, function (key, info) {
        //affiche chaque lien contenue dans le fichier
        $("#menu").append('<li class="nav-item" ><a href="index.php?page='+info.nom+'" id="menu' + info.nom + '"  data-toggle="" data-target="" onclick="">' + info.nom + '</a></li>');
    })
    //On remplit les attribues de chaque lien du menu avec les informations correspondantes
    $("#menuconnexion").attr("data-toggle", "modal");
    $("#menuconnexion").attr("data-target", "#myModal");
    //Lorsqu'on clique sur le lien connexion, met le formulaire de connexion dans le modal qui s'affiche
    $("#menuconnexion").attr("onclick", "modalConnexion()");
});
//On met le formulaire de connexion dans le modal
function modalConnexion() {
    changeModalTitre("Connexion")
    changeModalBody('<form method="POST" action="action.php">' +
        '<div class="form-group"> <label for="email">Adresse Email:</label>' +
        '<input type="email" name="email" class="form-control" placeholder="-Email-" id="email"></div>' +
        '<div class="form-group"> <label for="pwd">Mot de Passe:</label>' +
        '<input type="password" name="pwd" class="form-control" placeholder="-Mot de passe-" id="pwd">  </div>' +
        '<div class="form-group form-check"><label class="form-check-label">' +
        '<input class="form-check-input" type="checkbox" placeholder="ok" > Se souvenir de moi </label> </div>'+
        ' <button type="submit" class="btn btn-info" data-dismiss="">Se Connecter</button></form > ')
    changeModalFooter('')
}

</script>