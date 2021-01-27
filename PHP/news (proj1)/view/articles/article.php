<div class="container border mt-4 mb-4">
  <h2 class="mt-4"><a href="?page=art&id=<?php echo $article->id_cat ?>&id_art=<?php echo $article->id ?>"><?php echo $article->titre ?></a></h2>
  <img src="<?php echo $article->img ?>" />
  <div> Date : <?php echo $article->_date ?> |
    Auteur : <?php echo $article->nom ; echo $article->prenom ?> |
    Catégorie : <?php echo $article->nom_cat ?> </div><br>

  <p><?php echo $article->contenu ?></p>
</div>