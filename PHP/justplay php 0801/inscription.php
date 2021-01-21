<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>JustPlay</title>
</head
>
<body>
    <section class=" mt-3 " id="tarification">
      <h2 class="text-center underline">Tarification</h2>
      <div  id="tarifcarte"></div>
    </section>

      <!-- Modal  Global-->
<div class="modal " id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" >
      </div>

    </div>
  </div>
</div>

<script src="js/script.js"></script>

<script>
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
    $("#forfaitcarte>.card-footer>button").on('click', function () {
        //on récupère le forfait
        const key = getKey(this);
        //change les parties du modal
        changeModalTitre("Inscription");
        changeModalBody('<form action="/action_page.php">' +
            '<div class="form-group"> <label for="nom">Nom:</label>' +
            '<input type="nom" class="form-control" placeholder="-Nom-" id="email"></div>' +
            '<div class="form-group"> <label for="prenom">Prénom:</label>' +
            '<input type="prenom" class="form-control" placeholder="-Prénom-" id="prenom">  </div>' +
            '<div class="form-group"> <label for="email">Adresse Email:</label>' +
            '<input type="email" class="form-control" placeholder="-Email-" id="email"></div>' +
            '<div class="form-group"> <label for="pwd">Mot de Passe:</label>' +
            '<input type="password" class="form-control" placeholder="-Mot de Passe-" id="pwd">  </div>' +
            '<div class="form-group"> <label for="pwd">Prix à payer:</label>' +
            '<span class=" font-weight-bold">' + dataforfait[key].prix + '€</span>  </div>');
        changeModalFooter('<button type="button" class="btn btn-info" data-dismiss="modal">S\'inscrire</button>')
    })
})
</script>
</body>

</html>