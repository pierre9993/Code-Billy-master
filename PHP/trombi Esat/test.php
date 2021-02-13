<?php
include('bdd.php');

class test1
{
    // visibilites sur proprietes et methodes
    /**
     * private
     * --------------------------
     * appeler dans la class elle meme
     * 
     * public
     * ----------------------------
     * appeler à l'exterieur de la class
     * 
     * protected
     * ----------------------------
     * appeler dans la class elle meme et dans les class qui herite
     */

    // proprietes

    private $private = "visibilite private";
    public $public = "visibilite public";
    protected $protected = "visibilite protected";

    public $bdd;


    public function __construct()
    {
        $this->bdd = Bdd::Connection();
                
        $this->private = "bonjour je suis privé";
    }


    // methodes

    private function methodePrivate()
    {
        echo "methode private";
    }

    protected function methodeProtected()
    {
        echo "methode protected";
    }

    public function methodePublic()
    {
        echo "methode public";
    }



    public function getPrivate()
    {
        echo $this->private;
    }


    public function setPrivate($valeur)
    {
        $this->private = $valeur;
    }
}


$test1 = new test1();


$test1->getPrivate(); // visibilite private 
$test1->setPrivate("dqsdqsdqs"); // visibilite private 
 

/*
/*
echo $test1->private; // Fatal error: Cannot access private property
echo $test1->public; // visibilite public
echo $test1->protected; // Fatal error: Cannot access protected property
*/
//echo $test1->public;
//$test1->methodePublic(); // private
/*
echo "<br>";

$test2 = new test();

//$test2->getPrivate(); // visibilite private 


echo "<br>";
echo $test2->public; // visibilite public get
$test2->public="test public"; //set

echo "<br>";
echo $test2->public; // test public // get

*/