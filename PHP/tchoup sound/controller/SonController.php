<?php
include('model/sonModel.php');

class SonController
{

    public static function afficheListeSon()
    {
        $listeSons = Son::listeSons();
        include('view/son/listeSonsView.php');
    }
    public static function afficheSon($id)
    {
        $son = Son::getInfo($id);
        include('view/son/sonView.php');
    }
    public static function afficheAjoutSon()
    {
       if (@$_POST['nom_son']!== null){
           echo 'début post';
            $nom_son = $_POST['nom_son'];
            include('controller/fileController.php');
            
            $fichier = new FileController;
            $img_son = $fichier->upload('img_son',$nom_son);
            $lien_son = $fichier->upload('lien_son',$nom_son);
            var_dump( $img_son, $lien_son);
            if ($nom_son !== null && $img_son !== null && $lien_son !== null) {
                echo 'tout les champs son bien remplis';
                $son = Son::ajoutSon($img_son, $lien_son);
            }
        }
        include('view/son/ajoutSonView.php');
        echo 'affichage base';
    }
}
