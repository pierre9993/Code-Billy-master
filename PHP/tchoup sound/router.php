<?php

class Router
{

    public $page;

    //stocke $_GET['page']
    public function __construct($page)
    {
        $this->page = $page;
    }

    //affiche une page en fonction de la page stocké
    public function getPage()
    {
        switch ($this->page) {
            case 'aeae':
                break;
            default:
                include('controller/SonController.php');
                SonController::afficheListeSon();
                break;
        }
    }
}
