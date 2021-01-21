<?php
//On déclare une variable avec $
  $jour = true;
  $nom = "gros bg";
  $tableauAssociatif = [["nom" => "KIM", "prenom" => "Sangoku" ],["nom" => "Jojo", "prenom" => "Jhon" ],["nom" => "Pastel", "prenom" => "Richard" ]];
  
  //les fonctions sont déclarées de la même manière qu'en JS
  function salutation($qui,$jour){
    //pareil pour les conditions qui sont identiques
    if($jour === true){
      //on concatene avec . et non + | le "\n" crée un saut de ligne
    return " Bonjour " . $qui . ". \n" ;
  }
    else{
    return " Bonsoir " . $qui . ". \n";
  }}
  foreach($tableauAssociatif as $eleve){
    // echo équivaut à un console.log dans notre terminal
    echo salutation($eleve["prenom"]." ".$eleve["nom"],$jour);
}

// CLASS *//***
class Eleve {
  $nom;
  $prenom;
};

//OBJET

$eleve= new Eleve();
$eleve->nom;
$eleve->prenom;

$eleve->nom="Kim";

$eleve2= new Eleve();
$eleve2->nom="Dupont";
$eleve2->prenom='Gabin';
?>