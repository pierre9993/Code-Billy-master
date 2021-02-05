<div id="profilsHead" class='d-flex flex-row align-items-center justify-content-between container border mt-3 bg-dark text-light col-11'>
    <h1>Liste de profils</h1>
    <a href="?page=ajoutProfil" class="button bg-light text-dark pr-2 pl-2"> Ajout profil</a>
</div>
<div class="d-flex flex-row flex-wrap">
    <?php
;
    if (count($profilsCherche > 0)){
        foreach ($profilsCherche as $profil) {

            echo "<div id='divProfils' class='container col-11 border mb-3 mt-3 d-flex flex-row justify-content-between align-items-center bg-light '>";
            echo "<img class='col-2 m-3 border p-0' src='" . $profil['image'] . "'/>";
            echo "<p class='col-7 text-center'>" . $profil['info']  . "</p>";
            echo "<a class='text-center col-2 border bg-dark text-light shadow-sm' href='?page=profil&id=" . $profil['id_user'] . "'>" . $profil['nom']  . " " . $profil['prenom'] . "</a>";
            echo "</div>";
        }
    }
    else {
        echo $profilsCherche;
    }
    ?>
</div>

