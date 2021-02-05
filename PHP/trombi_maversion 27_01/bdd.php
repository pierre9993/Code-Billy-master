<?php

class Bdd
{
    //  PROPRIETES


    //  METHODES
    public static function connexion()
    {
        try {
            $bdd = new PDO("mysql:host=localhost;dbname=trombi","root","root");
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bdd;
        } catch (Exception $e) {
            die('erreur de connexion à la bdd <br> $e');
        }
    }
}
