<?php

class Utilisateur
{
    public $nom;
    public $prenom;
    public $email;
    public $tel;
    public $mdp;

    public function fetchUser()
    {
        $this->nom = $_POST["nom"];
        $this->prenom = $_POST["prenom"];
        $this->email = $_POST["email"];
        $this->tel = $_POST["tel"];
        $this->mdp = $_POST["mdp"];
    }

    public function ajoutUser($bdd)
    {
        $sql = $bdd->prepare("INSERT INTO utilisateur (nom,prenom,email,tel,mdp) VALUES (?,?,?,?,?)");

        if ($sql->execute(["$this->nom", "$this->prenom", "$this->email", "$this->tel", "$this->mdp"])) {
            echo "<div class='text-center alert alert-success'>Inscription réussie </div>";
        } else {
            echo "<div class='text-center alert alert-danger'>Inscription Interrompu </div>";
        }
    }
}
