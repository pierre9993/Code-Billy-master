<?php
include("test.php");

// la classe test2 herite de la class test1
class test2 extends test1
{

    public function getProtected()
    {
        echo $this->protected;
        
    }

    public function setProtected($valeur)
    {
        $this->protected = $valeur;
    }

    public function heritage()
    {
        
        $this->methodeProtected(); // ok
        
        $this->methodePublic(); // ok
    }
}

$test = new test2();

$test->methodePublic(); 
echo "<br>";


$test->setProtected("hello"); // visibilite protected
echo "<br>";

$test->getProtected(); // visibilite protected
echo "<br>";


//$test->getPrivate(); // Fatal error: Cannot access private property
echo "<br>";

//echo $test->protected; // Fatal error

echo $test->public; // visibilite public
echo $test->bdd; // OK
