<script>
    
//AFFICHAGE DU FOOTER
$.get('footer.json').done(function (datafooter) {
    $('body').append('<footer class="bg-light border-top border-bottom shadow-sm align-self-end" ><ul id="footer"></ul></footer>')
    $.each(datafooter, function (key, info) {
        $('#footer').append('<li id="footer' + info.nom + '"><a href="#" id="footer' + key + '"  data-toggle="modal" data-target="#myModal">' + info.nom + '</a></ul>')
    })
    //Lorsqu'on clique sur le lien A propos du footer
    $("#footer0").on('click', function () {
        //On affiche les informations de l'entreprise dans le modal
        changeModalTitre("À propos de JUST PLAY");
        changeModalBody("<p>JUST PLAY est une entreprise de distribution des vidéos situé à Noisy-le-Grand.</p><p>Elle a pour projet de distribuer des films, des documentaires et des séries en streaming via internet  VOD.</p>");
        changeModalFooter('<button type="button" class="btn btn-info" data-dismiss="modal">Fermer</button>')
    })
    $("#footer1").on('click', function () {
        //Lorsqu'on clique sur le lien "mentions légales" du footer
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
            '<input type="nom" class="form-control" placeholder="-Nom-" id="nom"></div>' +
            '<div class="form-group"> <label  for="prenom">Prénom*:</label>' +
            '<input type="prenom" class="form-control" placeholder="-Prénom-" id="prenom">  </div>' +
            '<div class="form-group"><label for="motif">Motif*:</label><br><select id="motif-select">' + '<option value="">-Choisissez un motif-</option>' + '<option value="réclamation">Réclamation</option>' +
            '<option value="suggestion">Suggestion</option><option value="emplois">Emplois</option><option value="autre">Autre</option></select> </div>' +
            '<div class="form-group"> <label  for="pwd">Message*:</label>' +
            '<input type="text-box" class="form-control" placeholder="-Message-" R=" " id="message">  </div> ' +
            '<div class="form-group"><p class="underline">Adresse:</p><p>15 Rue de l\'Université, 93160 Noisy-le-Grand</p><img style="width:100%;" class="border" src="img/carte.PNG" /></div> </form > ')
        changeModalFooter('<button type="button" class="btn btn-info" data-dismiss="modal">Envoyer</button>')

    })

});
</script>