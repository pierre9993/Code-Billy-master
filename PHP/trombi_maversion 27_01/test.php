<?php

class Test
{
    //PROPRIETE
   
    /**
     * 
     * public
     * --------------------
     * peut être appeler à l'exte de la class
     * 
     * private
     * ----------------------
     * Doit être appelé dans la class elle meme 
     * 
     * protected
     * ---------------
     * Appeler dans la classe elle meme et dans les class qui herite
     */
    

    private $private = "private";
    public $public = "public";
    protected $protected = "protected";
    public $bdd;
    private $valeur = "Hello";

    //METHODES
    public function __construct()
    {
        $this->bdd=Bdd::connexion();
    }

    public function getPrivate()
    {
        echo $this->valeur; //marche
    }
    public function setPrivate($valeur)
    {
        $this->valeur = $valeur; //marche
    }

    public function methodPublic()
    {
        echo $this->public; //marche
        echo $this->private; //marche
    }
    private function methodPrivate()
    {
        echo"method private";
    }
    protected function methodProtected()
    {
        echo" methode protected";
    }

}


$test1 = new Test();
$test1->setPrivate("Hola"); //set (PRIVATE donc on doit le faire depuis une méthode)
$test1->getPrivate(); //get (PRIVATE donc on doit le faire depuis une méthode)
/*
echo $test1->public;//marche
echo $test1->private;// ERROR
$test1->methodPublic();//marche
*/
echo "<br>";


$test2 = new Test();
$test2->getPrivate(); //get
echo $test2->public = " coucou "; //set (Public don on peut le faire hors méthode)
echo $test2->public;//get (Public don on peut le faire hors méthode)

