<?php

class Controller
{
    private $dossierView = "view";

    protected function affiche404()
    {
        include($this->dossierView . "/404.php");
    }

    protected function afficheView(string $cheminVue)
    {
        include($this->dossierView . "/" . $cheminVue);
    }
}
