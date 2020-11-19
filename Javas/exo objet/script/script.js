/**
 * Déclaration de la variable contenant les informations sur les élèves
 */

var info_eleves = [
    {nom: "Dupont",prenom: "Valérie" },
    {nom: "Boha",prenom: "Billy"},
    {nom: "Mossan",prenom: "Bastien"},
    {nom: "Cruise",prenom: "Ines"},
];
/**
 * Fonction qui affiche le nom et le prénom des élèves sous forme de liste
 */
function afficherEleves() {
    document.getElementById("elelist").innerHTML = "";
    //Reset du contenu de la liste

    for (i = 0; i < info_eleves.length; i++) {
        //boucle qui affiche autant d'élèves qu'il y en a dans la variable info_eleves

        var eleves_objet = info_eleves[i];
        document.getElementById("elelist").innerHTML += "<li><hr/><br/> <b><u>Nom</u></b> : " + eleves_objet.nom + "<b> <u> Prénom</u></b> : " + eleves_objet.prenom + "</li><br/>"
    }
}
/**
 * Fonction qui affiche uniquement le nom des élèves sous forme de liste
 */

function afficherNomEleves() {
    document.getElementById("elelist").innerHTML = "";
//Reset du contenu de la liste
    for (i = 0; i < info_eleves.length; i++) {
        var eleves_objet = info_eleves[i];
        eleves_objet.sort(function(a, b){return a - b});

        document.getElementById("elelist").innerHTML += "<li> <b><u>Nom</u> :</b> " + eleves_objet.nom + "</li><br/><hr/>"
    }
}
/**
 * Fonction qui affiche uniquement le prénom des élèves sous forme de liste
 */
function afficherPrenomEleves() {
    document.getElementById("elelist").innerHTML = "";
//Reset du contenu de la liste

    for (i = 0; i < info_eleves.length; i++) {
        var eleves_objet = info_eleves[i];
        eleves_objet.prenom.sort();

        document.getElementById("elelist").innerHTML += "<li> <b><u>Prénom</u> :</b> " + eleves_objet.prenom + "</li><br/><hr/>"
    }
}

  
