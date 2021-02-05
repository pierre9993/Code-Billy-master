<?php


class Test2 extends Test
{

    public function getHeritageProtected()
    {
        echo $this->protected;
    }
    public function getHeritagePrivate()
    {
        echo $this->private;
    }
    public function getheritageMethod()
    {
       echo $this->methodProtected();
    }
}

$test21 = new Test2();
$test21->getHeritageProtected();//Ok
//$test21->getHeritagePrivate();//error    
$test21->getheritageMethod();