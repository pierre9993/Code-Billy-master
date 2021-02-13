<?php
if (isset($_GET['id_sup'])) {
    if ($profilSup === true) {
        echo " <div class='mt-3 text-center text-success'>Profil " . $_GET['id_sup'] . " supprimé avec succès ! </div>";
    } else {
        echo " <div class='mt-3 text-center text-danger'>Erreur lors de la suppression ! </div>";
    }
}
if (isset($_GET['cat_sup'])) {
    if ($catSup === true) {
        echo " <div class='mt-3 text-center text-success'>Catégorie " . $_GET['cat_sup'] . " supprimé avec succès ! </div>";
    } else {
        echo " <div class='mt-3 text-center text-danger'>Erreur lors de la suppression ! </div>";
    }
}
if (isset($_POST['nom_cat'])) {
    if ($catSet === true) {
        echo " <div class='mt-3 text-center text-success'>Catégorie " . $_POST['nom_cat'] . " ajouté avec succès ! </div>";
    } else {
        echo " <div class='mt-3 text-center text-danger'>Erreur lors de la création ! </div>";
    }
}
?>
<div>
    <h2>Admin</h2>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Utilisateurs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="categorie-tab" data-toggle="tab" href="#categorie" role="tab" aria-controls="categorie" aria-selected="false">Catégories</a>
        </li>
    </ul>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Suppression de profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="delete-body">
      </div>
      <div class="modal-footer">
        <a class="btn border" id="delete-btn" href="a">Delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

    <div class="tab-content container col-11" id="myTabContent">
        <div class="tab-pane fade show active " id="users" role="tabpanel" aria-labelledby="users-tab">

            <table class="table table-bordered mt-3 ">
                <thead>
                    <tr class="">
                        <th class="text-center" style="width: 50px;" scope="col">#</th>
                        <th style="width: 150px;" scope="col">Image</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th style="width: 120px;"> Option</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php
                    foreach ($profils as $profil) {
                        echo '<tr >
            <td class="text-center font-weight-bold">  ' . $profil['id_user'] . '</td>
          <td>  <img class="" style="height:40px;width:100%;" src="' . $profil['image'] . '"/></td>
          <td >  ' . $profil['nom'] . '</td>
          <td>  ' . $profil['prenom'] . '</td>
          <td> <button type="button" id="' . $profil['id_user'] . '" class="btn-delete btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">  Supprimer</button>
          </td>
            </tr>';
                    }

                    ?>
                    

                </tbody>
            </table>
            
        </div>
        <script>
        $('.btn-delete').on('click', function(){
            var id= $(this).attr('id');
            $('#delete-body').text("Êtes-vous sûr de vouloir supprimer le profil "+id+" ?");
            $('#delete-btn').attr("href","index.php?page=admin&id_sup="+id);
        })

            $("#users-tab").on("click", function() {
                $("footer").css('display', "none");
                $("#categorie-tab").html('Catégories');
            })
            $("#categorie-tab").on("click", function() {
                $("footer").css('display', "none");
                $("#categorie-tab").html('Catégories<button type="button" style="height:20px;width:20px;" class="p-0 mb-2 ml-2 btn text-primary " data-toggle="modal" data-target="#myModal">+</button>');
            })
        </script>
        <div class="tab-pane fade show" id="categorie" role="tabpanel" aria-labelledby="categorie-tab">

            <table class="table table-bordered mt-3 ">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;" scope="col">#</th>
                        <th scope="col">Catégories</th>
                        <th style="width: 200px;" scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cats as $cat) {
                        echo ' <tr> <th scope="row" class="text-center">' . $cat["id_cat"] . '</th>
                        <td>' . $cat["nom_cat"] . '</td><td>
                        <a class="btn border" href="index.php?page=admin&cat_mod=' .  $cat["id_cat"]  . '">Modifier</a>
                        <a class="btn border btn-danger" href="index.php?page=admin&cat_sup=' .  $cat["id_cat"]  . '">Delete</a>
                        </td> </tr>';
                    }
                    ?>
                </tbody>

        </div>
    </div>
</div>



<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Nouvelle Catégorie</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nom_cat">Nom Catégorie</label>
                        <input type="text" class="form-control" name="nom_cat" id="nom" value="" placeholder="Enter nom Catégorie">
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"  >Ajouter</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
                    </form>
        </div>
    </div>
</div>