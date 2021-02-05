<?php
include('model/sonModel.php');

class SonController{
   
    public static function afficheListeSon(){
        $listeSons= Son::listeSons();
        include('view')
    }

}