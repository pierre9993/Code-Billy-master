<?php 
/*
$articlemenu= new Article($bdd);
$articlemenu->topArticle($bdd); 
*/
?>

<h1 class="container-fluid border mt-4">TOP ARTICLES</h1>

<div class="container border mt-4 mb-4">
<?php 
     while ($article = $topArt->fetch()) {
        echo '<h2><a href="?page=art&id=' . $article["id_cat"] . '&id_art=' . $article["id_article"] . '">' . $article["titre"] . '</a></h2>';
     }
?>
</div>