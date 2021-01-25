<h1 class="container-fluid border mt-4">TOP ARTICLES</h1>
<?php 

$articlemenu= new Article($bdd);
$articlemenu->topArticle($bdd); 

?>