<?php



while ($ligne = $cat->fetch()) {
            echo '<div class="container border mt-4 mb-4"><h2 class="mt-4" ><a href="?page=art&id=' . $ligne["id_cat"] . '&id_art=' . $ligne["id_article"] . '">' . $ligne["titre"] . '</a></h2>' .
                '<p>' . utf8_encode($ligne["contenu"]) . '</p></div>';
        };
?>