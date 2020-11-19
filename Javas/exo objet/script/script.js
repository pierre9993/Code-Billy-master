/**
 * Déclaration de la variable contenant les informations sur les élèves
 */

var eleves = [
    { nom: "Dupont", prenom: "Valérie", age: "30 ans" },
    { nom: "Boha", prenom: "Billy", age: "25 ans" },
    { nom: "Mossan", prenom: "Bastien", age: "36 ans" },
    { nom: "Cruise", prenom: "Ines", age: "42 ans" },
];
// execute la fonction qui affiche les élèves automatiquements au lancement

/**
 * Fonction qui affiche le nom et le prénom des élèves sous forme de liste
 */
function afficherEleves(eleves) {
   videTableau();   //Reset du contenu de la liste

    for (i = 0; i < eleves.length; i++) {
        //boucle qui affiche autant d'élèves qu'il y en a dans la variable info_eleves

        var eleves_objet = eleves[i];
        document.getElementById("elelist").innerHTML += "<li><hr/><br/> <b><u>Nom</u></b> : " + eleves_objet.nom + "<b> <u> Prénom</u></b> : " + eleves_objet.prenom + "<b> <u > Âge </u></b> : " + eleves_objet.age + "</li><br/>";
        document.getElementById("eletable").innerHTML += "<tr> <td>" + eleves_objet.nom + "</td> <td>" + eleves_objet.prenom + " </td> <td>" + eleves_objet.age + "</td>  </tr>";
    }
}

function videTableau(){
    document.getElementById("elelist").innerHTML = "";
    document.getElementById("eletable").innerHTML = "<thead><tr>    <th>Nom <button onclick='triEleves(eleves,'nom')'>trier</button></th>    <th>Prenom <button onclick='triEleves(eleves,'prenom')'>trier</button></th>  <th>Âge<button onclick='triEleves(eleves,'age')'>trier</button></th></tr></thead>";
}




var bascules = {"nom" : null, "prenom" : null, "age": null };

function trieEleve(eleves, propriete) {
    console.log(eleves)
    // pour trier, je dois pouvoir comparer les éléments de la liste entre eux !
    // ex : [2, 5, 1]  : 1 < 2 < 5
    function comparerParPropriete (eleve1, eleve2) {
      return comparerEleve(eleve1, eleve2, propriete);
    }
    
    eleves.sort(comparerParPropriete);
    
    videTableau();
    afficherEleves(eleves);
  }
  
  /**
   * Fonction qui permet de comparer 2 objets "élève"
   *
   * @param {Object} eleve1
   * @param {Object} eleve2
   * @param {string} propriete Propriété sur laquelle on trie
   * @returns {number} 1 si eleve1 > eleve2, -1 sinon
   */
  function comparerEleve(eleve1, eleve2, propriete) {
    if (bascules[propriete] === null || bascules[propriete] === true){
      var greater = eleve1[propriete] > eleve2[propriete] ? 1 : -1;
      bascules[propriete] = false;
    }
    else {
      var greater = eleve1[propriete] < eleve2[propriete] ? 1 : -1;
      bascules[propriete] = true;
    }
    return greater;
  }
  