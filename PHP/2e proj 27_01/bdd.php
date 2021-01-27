<?php

class Bdd
{
    //  PROPRIETES
    private $host = 'localhost';
    private $dbname = "trombi";
    private $login = 'root';
    private $mdp = 'root';


    //  METHODES
    public function connexion()
    {
        try {
            $bdd = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname,  $this->login, $this->mdp);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bdd;
        } catch (Exception $e) {
            die('erreur de connexion à la bdd <br> $e');
        }
    }
}
