/**
 * Déclaration de la variable contenant les informations sur les élèves
 */

var eleves = [
  { nom: "Dupont", prenom: "Valérie", age: 30 },
  { nom: "Boha", prenom: "Billy", age: 25 },
  { nom: "Mossan", prenom: "Bastien", age: 36 },
  { nom: "Cruise", prenom: "Ines", age: 42 },
];
/**
 * Fonction qui affiche le nom et le prénom des élèves sous forme de liste
 */
function afficherEleves(eleves) {
  videTableau();   //Reset du contenu de la liste

  for (i = 0; i < eleves.length; i++) {
    //boucle qui affiche autant d'élèves qu'il y en a dans la variable info_eleves

    var eleves_objet = eleves[i];
    document.getElementById('elelist').innerHTML += "<li><hr/><br/> <b><u>Nom</u></b> : " + eleves_objet.nom + "<b> <u> Prénom</u></b> : " + eleves_objet.prenom + "<b> <u > Âge </u></b> : <span class=\'ans\'>" + eleves_objet.age + "</span><b> <u > Note </u></b> : " + noter(eleves_objet, calculNote) + "</li><br/>";
    document.getElementById("eletable").innerHTML += "<tr> <td>" + eleves_objet.nom + "</td> <td>" + eleves_objet.prenom + " </td> <td><span class=\'ans\'>" + eleves_objet.age + "</span></td> <td>" + noter(eleves_objet, calculNote) + "</td> </tr>";
  }
}

function videTableau() {
  document.getElementById("elelist").innerHTML = "";
  document.getElementById("eletable").innerHTML = "<thead><tr>    <th>Nom <button onclick=\"trieEleve(eleves,'nom')\">trier</button></th>    <th>Prenom <button onclick=\"trieEleve(eleves,'prenom')\">trier</button></th>  <th>Âge<button onclick=\"trieEleve(eleves,'age')\">trier</button></th><th>Note<button onclick=\"trieEleve(eleves,'note')\">trier</button></th></tr></thead>";
}


function noter(eleves_objet, calcul = undefined) {
  if (calcul === undefined) {
    calcul = function () { return Math.round(Math.random() * 20); };
  }
  return calcul(eleves_objet);
}

function calculNote(eleves_objet) {
  var note = (eleves_objet.nom === "Cruise") ? 20 : 10

  return note;
}



var ascendant = { "nom": undefined, "prenom": undefined, "age": undefined };
/**
 * Fonction qui trie la listes des élèves, en fonction de la propriété donnée
 * @param {Array} eleves liste des elèves
 * @param {string} propriete Propriété à comparer
 */

function trieEleve(eleves, propriete) {
  // Est-ce que le tri est ascendant (du plus petit au plus grand) ou descendant ?
  if (ascendant[propriete] === undefined || ascendant[propriete] === true) {
    var order = "ASC"
    ascendant[propriete] = false;
  }
  else {
    var order = "DESC"
    ascendant[propriete] = true;
  }
  // pour trier, je dois pouvoir comparer les éléments de la liste entre eux !
  // ex : [2, 5, 1]  : 1 < 2 < 5  
  eleves.sort(comparerEleve.bind(null, propriete, order));

  // Puis je vide le tableau et je le remplis avec 
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

function comparerEleve(propriete, order, eleve1, eleve2) {
  if (order === "ASC") {
    if (eleve1[propriete] > eleve2[propriete]) {
      var greater = 1;
    }
    else {
      var greater = -1
    }

  }
  else {
    if (eleve1[propriete] < eleve2[propriete]) {
      var greater = 1;
    }
    else {
      var greater = -1
    }
  }
  return greater;
}
 /*
function comparerEleve(propriete, order, eleve1, eleve2 ) {
 if (order === "ASC"){
   var greater = eleve1[propriete] > eleve2[propriete] ? 1 : -1;
 }
 else {
   var greater = eleve1[propriete] < eleve2[propriete] ? 1 : -1;
 }
 return greater;
}
*/