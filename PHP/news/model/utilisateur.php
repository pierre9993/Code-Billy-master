<?php

class Utilisateur
{
    public $nom;
    public $prenom;
    public $email;
    public $tel;
    public $mdp;



    // REMPLIT LES INFOS DE L'UTILISATEUR QU'ON RECUPERE
    public function fetchUser()
    {
        $this->nom = $_POST["nom"];
        $this->prenom = $_POST["prenom"];
        $this->email = $_POST["email"];
        $this->tel = $_POST["tel"];
        $this->mdp = $_POST["mdp"];
    }

    //INSERE LES  DONNEES DE L'UTILISATEUR DANS UNE NOUVELLE LIGNE DE LA TABLE UTILISATEUR ET INFORME DE LA REUSSITE OU NON
    public function ajoutUser($bdd)
    {
        $sql = $bdd->prepare("INSERT INTO utilisateur (nom,prenom,email,tel,mdp) 
         VALUES (:nom,:prenom,:email,:tel,:mdp)");
        $sql->execute([
            ":nom" => $this->nom, 
            ":prenom " => $this->prenom,
            ":email" => $this->email, 
            ":tel" => $this->tel, 
            ":mdp" => $this->mdp
             ]); 
        
    }
}
