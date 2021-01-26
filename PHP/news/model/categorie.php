<?php

class Categorie
{
    public $id_cat;
    public $nom_cat;

    public function insert($bdd){
        $sql =$bdd->prepare("INSERT INTO categories(nom_cat)
        VALUES (:nom_cat)");
        if ($this->nom_cat!==null){
        $sql->execute([":nom_cat" => $this->nom_cat]);
        }
    }



    public function update($bdd){
        $sql =$bdd->prepare("UPDATE categories
        SET nom_cat=:nom_cat
        WHERE id_cat=:id_cat");
        $sql->execute([":nom_cat"=>$this->nom_cat ,":id_cat"=>$this->id_cat]);
    }




    public function delete($bdd){
        $sql =$bdd->prepare("DELETE FROM categories
        WHERE nom_cat=:nom_cat");
        $sql->execute([":nom_cat"=>$this->nom_cat]);
    }





}