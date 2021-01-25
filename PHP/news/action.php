<?php

    include("index.php");  

    
    $user= new Utilisateur();
    $user->fetchUser($bdd);
    $user->ajoutUser($bdd);


//ajouteUser($bdd);
/*
public function ajoutUser($bdd)
    {
        $sql = $bdd->prepare("INSERT INTO utilisateur (nom,prenom,email,tel,mdp) VALUES (:nom,:prenom,:email,:tel,:mdp)");

        if ($sql->execute([":nom" => $this->nom, ":prenom " => $this->prenom, ":email" => $this->email, ":tel" => $this->tel,":mdp" => $this->mdp])) {
            echo "<div class='text-center alert alert-success'>Inscription réussie </div>";
        } else {
            echo "<div class='text-center alert alert-danger'>Inscription Interrompu </div>";
        }
    }


      //INSERE LES  DONNEES DE L'UTILISATEUR DANS UNE NOUVELLE LIGNE DE LA TABLE UTILISATEUR ET INFORME DE LA REUSSITE OU NON
    public function ajoutUser($bdd)
    {
        $sql = $bdd->prepare("INSERT INTO utilisateur (nom,prenom,email,tel,mdp) VALUES (?,?,?,?,?)");

        if ($sql->execute(["$this->nom", "$this->prenom", "$this->email", "$this->tel", "$this->mdp"])) {
            echo "<div class='text-center alert alert-success'>Inscription réussie </div>";
        } else {
            echo "<div class='text-center alert alert-danger'>Inscription Interrompu </div>";
        }
    }
*/