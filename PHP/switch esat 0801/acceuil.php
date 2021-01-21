<?php require "connexion.php"; ?>
<h1>Accueil</h1>
<h2>Utilisateurs</h2>
<pre>
    <?php
        $query_users = $dbh->query("SELECT * FROM utilisateur");
        $users = $query_users->fetchAll(PDO::FETCH_ASSOC);
      //  print_r($users); AFFICHE CE QUI SE PASSE
      echo "<strong>ECRIT DEPUIS PHP</strong><br/>";
      echo( "<table><thead><tr><th>Id</th><th>Nom</th><th>Prenom</th><th>Email</th><th>Tel</th><th>Mdp</th></tr></thead><tbody>");
  /* Cette partie affiche pour tous les utilisateurs les catégories que l'on veut 
       foreach($users as $user){
            echo "<tr><td>".$user["identifiant_user"]. "</td><td>".$user["nom"]. "</td><td>".$user["prenom"]. "</td><td>".$user["email"]. "</td><td>".$user["tel"]. "</td><td>".$user["mdp"]. "</td></tr>";
        }*/

    // Celle si affiche TOUTES les catégories de tous les utilisateurs
        foreach($users as $user){
            echo"<tr>";
            foreach($user as $info){
                echo "<td>".$info. "</td>";
            }
            echo"</tr>";
        }
        echo "</tbody></table>";
    ?>
</pre>
    

    


<h2>Roles</h2>
<pre>
    <?php
    $roles = $dbh->query("SELECT role FROM roles");
    print_r($roles->fetchAll(PDO::FETCH_ASSOC));
    ?>
</pre>