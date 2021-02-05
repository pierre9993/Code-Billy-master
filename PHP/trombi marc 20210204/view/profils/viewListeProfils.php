<h1>Liste des Profils</h1>
<div class="listeProfils">
    <?php
    /** @var Model\ProfilModel[] $listeProfils */
    foreach ($listeProfils as $profil) {
        echo "<div>
    <img src='" . $profil->getImage() . "' class='photo' ><br>
    <a href='index.php?page=profil&id=" . $profil->getId() . "'>
    " . $profil->getFullname() . "
    </a>
    </div>";
    }
    ?>

</div>