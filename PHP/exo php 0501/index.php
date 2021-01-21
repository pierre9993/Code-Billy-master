<?php 

$donnees = [    ["nom" => "Zer", "prenom" => "Free"],
    ["nom" => "De Niro", "prenom" => "Robert"],
    ["nom" => "Downey Jr.", "prenom" => "Robert"],
    ["nom" => "Chu", "prenom" => "Pika"],
    ["nom" => "Daniels", "prenom" => "Jack"]];

$colonnes = ["nom", "prenom"];

function minuscule($mot)
{
    return strtolower($mot);
}

function majuscule($mot)
{
    return strtoupper($mot);
}

function genCol($col){
    return $col . '|';
}

function genLigne($nbLettres){
    return str_repeat("=", $nbLettres);
}

function ajouteSautDeLigne($ligne)
{
    return "$ligne\n";
}

function afficheDansTerminal($chaine)
{
    echo $chaine;
}

/**
 * Cette fonction affiche à l'écran (dans le terminal) un tableau avec le nom des élèves en majuscule
 * et le prenom des élèves en minuscule, dans 2 colonnes différentes. (cf fonction genTableauEleves)
 * 
 * @param array $eleves Tableau des élèves, chaque élève étant un tableau associatif ["nom" => ... , "prenom" => ... ]
 * @param array $colonnes Tableau des noms des colonnes à afficher dans cet ordre
 */
function afficheTableauEleves($eleves, $colonnes){
    afficheDansTerminal(genTableauEleves($eleves,$colonnes));
}

/**
 * Renvoie un tableau "graphique", sous forme de chaine de texte, qui contient la liste des élèves
 * sur 2 colonnes, la première c'est le nom en majuscule, la deuxième c'est le prénom en minuscule.
 * 
 * @param array $eleves Tableau des élèves, chaque élève étant un tableau associatif ["nom" => ... , "prenom" => ... ]
 * @param array $colonnes Tableau des noms des colonnes à afficher dans cet ordre
 * @return string Renvoie le tableau sous forme de variable "string" php.
 */
function genTableauEleves($eleves,$colonnes){
    $tabody= "";
    $tabhead=   genCol("").genCol(majuscule($colonnes[0]).genEspace(compteLettreMot($colonnes[0]))).
                ajouteSautDeLigne(genCol(minuscule($colonnes[1]).genEspace(compteLettreMot($colonnes[1]))));;
    $tabhead.=  genCol("").ajouteSautDeLigne(genCol(genLigne(compteLettreMot($tabhead)-3)));
    foreach ($eleves as $eleve) {
    $tabody.=  genCol("").genCol(majuscule($eleve["nom"]).genEspace(compteLettreMot($eleve["nom"]))).
    ajouteSautDeLigne(genCol(minuscule($eleve["prenom"]).genEspace(compteLettreMot($eleve["prenom"]))));;
    }
    return $tabhead.$tabody;
}
//compte le nbr de lettre de l'entré
function compteLettreMot($mot){
    return strlen($mot);
}
//remplis (ou non) l'espace restant de la colonne
function genEspace($tailleDonnee){
    $tailleEspace = 10-$tailleDonnee;
    return str_repeat(" ",$tailleEspace );
}
afficheTableauEleves($donnees, $colonnes);
