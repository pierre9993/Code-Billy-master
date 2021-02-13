<?php

/**
 * declaration de la class Bdd
 */
class Bdd
{
    //  methode static
    public static function Connection()
    {
        try {
            $bdd = new PDO("mysql:host=sql304.epizy.com;dbname=epiz_27891609_trombi", "epiz_27891609",  "c2DXW4WkgX4x", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
         //   $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
            return $bdd;
        } catch (Exception $e) {
            die('erreur de connexion à la bdd <br> $e');
        }
    }
}

//$db =  Bdd::Connection();
