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
            case 'son':
                include('controller/SonController.php');
                SonController::afficheSon(@$_GET['id']);
                break;
            case 'ajoutSon':
                if(@$_SESSION['role']==='admin'){
                include('controller/SonController.php');
                SonController::afficheAjoutSon();
                }
                else{
                    include('view/404.php');
                }
                break;
            case 'login':
                include('view/menu/loginView.php');
                break;
            case 'deconnexion':
                $_SESSION=array();
                header('Location: index.php');
                break;
            default:
                include('controller/SonController.php');
                SonController::afficheListeSon();
                break;
        }
    }
}
