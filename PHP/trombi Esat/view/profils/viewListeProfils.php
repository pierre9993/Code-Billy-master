<h1>Liste des Profils</h1>
<div class="listeProfils">
<?php
foreach ($listeProfils as $profil) {

    echo "<div>
    
    <img src='" . $profil['image'] . "' class='photo' ><br>
    <a href='index.php?page=profil&id=" . $profil['id_user'] . "'>
    " . $profil['prenom'] . "
    " . $profil['nom'] . "
    </a>
    </div>";
}
?>

</div>