<?php 

class FormControl
{



    public function emailController($email){
        if (preg_match("#^[a-z0-9._-]{2,50}+@[a-z0-9._-]{2,50}\.[a-z]{2,5}$#", $email )){
            return true;
        }
        else{
            return false;
        }
    }
    public function nomController($nom){
        if (preg_match("#^[a-zA-Z._-\é\è\ê\']{2,50}$#", $nom )){
            return true;
        }
        else{
            return false;
        }
    }

}