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
</head>

<body class="bg-secondary ">

  <section id="carousel">
    <div id="demo" class="carousel slide" data-ride="carousel">

      <!-- Indicateurs -->
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>

      <!-- Les Slide -->
      <div class="carousel-inner" id="carouselContent">

      </div>

      <!-- Flèche droite et gauche -->
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>

    </div>
  </section>

  <!-- Le "top 10" avec la liste de films clickables -->
  <article id="arttop">
    <h2 class="col-12 text-center">Top Films et Séries</h2>
    <div id="topfilms" class="text-dark">
    </div>
  </article>

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
        <div class="modal-footer">
        </div>

      </div>
    </div>
  </div>




  <script src="js/script.js"></script>
  <script>
      
/**
 //Fonction d'ajout de slide au carousel
 * @param {object} data 
 * @param {number} film 
 */
function ajoutCarousel(data, film) {
    $('#carouselContent').append('<div class="carousel-item "><img src="' + data[film].img + '" alt="' + data[film].titre + '">' +
        '<div class="carousel-caption"><h2>' + data[film].titre + '</h2><p>' + data[film].catégorie + '</p></div> </div>')
}

/**
 //crée un nombre au hazard entre 0 et la longueur de l'entrée
 * @param {Object} data 
 */
function nombreAuHazard(data) {
    const nbr = Math.floor(Math.random() * data.length);
    return nbr
}
//récupération du fichier avec les informations des films
$.get('film.json').done(function (datafilm) {

    //Récupération des films à mettre dans le carousel
    for (let z = 0; z < 1; z = z) {
        var slide1 = nombreAuHazard(datafilm);
        var slide2 = nombreAuHazard(datafilm);
        var slide3 = nombreAuHazard(datafilm);
        // On pioche 3 films au hazard  
        if (slide1 != slide2 && slide1 != slide3 && slide2 != slide3) {
            //Si il n'y a pas de doublon, on continue
            z++;
        }
        else { }
    }

    //Ajout des slides dans le carousel
    // on insère le premier slide avec une class"active"
    $('#carouselContent').append('<div class="carousel-item active"><img  src="' + datafilm[slide1].img + '" alt="' + datafilm[slide1].titre + '">' +
        '<div class="carousel-caption"><h2>' + datafilm[slide1].titre + '</h2><p>' + datafilm[slide1].catégorie + '</p></div> </div>');
    // on ajoute les deux slides restants
    ajoutCarousel(datafilm, slide2);
    ajoutCarousel(datafilm, slide3);

    // CREATIONS DU TOP FILMS    
    const filmtrié = datafilm.sort(function (film1, film2) { return film2.vu - film1.vu })
    // On trie les films pour les affichers dans l'ordre  décroissant des vu
    //et pour chaque film
    $.each(filmtrié, function (key, film) {
        //On donne un classement 
        let classement = key++;
        //on Créé une carte avec les informations du film
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
        changeModalTitre(filmtrié[key].titre);
        changeModalBody("<img src='" + filmtrié[key].img + "' id='carteimg' class='border shadow' /><div id='infofilm'><div><p class='text-center font-weight-bold underline mb-0'>Durée:</p><p class='text-center '>" + filmtrié[key].durée + "</p></div>" +
            "<div><p class='text-center font-weight-bold underline mb-0' >Date de Sortie:</p><p class='text-center mb-0'>" + filmtrié[key].sortie + "</p></div></div>");
        changeModalFooter('<button type="button" class="btn btn-info" onclick="modalConnexion()">Regarder</button>');
    })
})
</script>
</body>

</html>