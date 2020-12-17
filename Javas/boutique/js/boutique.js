var menu = [
    ["Produits", "#", "", "fa-code"], // 0 [0,1,2]
    ["Panier", "#", "", "fa-shopping-cart"], // 1 [0,1,2]
    ["Service", "service.html", "", "fa-concierge-bell"], // 2 [0,1,2]
    ["Contact", "#", "onclick='contact();'", "fa-comment-alt"], // 3 [0,1,2]
    ["Connexion", "#", "onclick='loginForm();'", "fa-user-circle"] // 3 [0,1,2]
];

var services = [
    { nom: "<center><h1>Service de Vente</h1>", img: "<img src='https://picsum.photos/300/300' >", description: "<p>Service de Vente en tout genre</p></center>" },
    { nom: "<center><h1>Service de Location</h1>", img: "<img src='https://picsum.photos/299/300' >", description: "<p>Service de Location en tout genre</p></center>" },
    { nom: "<center><h1>Service de Maintenance</h1>", img: "<img src='https://picsum.photos/300/299' >", description: "<p>Service de Maintenance en tout genre</p></center>" }
];

function go(){
    for (let i = 0; i < services.length; i++)
        document.getElementById('service').innerHTML += services[i].nom + services[i].img + services[i].description;
}
go();



/*
var menu = ["Produits", "Panier"];
var menuLink =["#produits", "#panier"]
*/
for (i = 0; i < menu.length; i++) {
    //   document.querySelector("#menu").innerHTML += "<li><a href='#produits'>Produits</a></li>";
    document.querySelector("#menu").innerHTML += '<li><a href="' + menu[i][1] + '" ' + menu[i][2] + '><i class="fas ' + menu[i][3] + '"></i> ' + menu[i][0] + '</a></li>';
}


var total = 0;

var produits = [
    ["Audi Q5", "https://picsum.photos/200/100", 2500], // 0 [0,1,2]
    ["Renault Clio", "https://picsum.photos/200/103", 500], // 1 [0,1,2]
    ["DS 7", "https://picsum.photos/200/102", 4500], // 2 [0,1,2]
    ["peugeot 206", "https://picsum.photos/200/101", 2500], // 3 [0,1,2]
    ["peugeot 3008", "https://picsum.photos/200/99", 2800], // 3 [0,1,2]
    ["Renault R9", "https://picsum.photos/200/97", 400], // 3 [0,1,2]
];


for (i = 0; i < produits.length; i++) {
    document.querySelector("#produits").innerHTML += "<article ><img src='" + produits[i][1] + "' ><p>" + produits[i][0] + "<p><h2> " + produits[i][2] + "€</h2><button onclick='ajoutPanier(" + i + ");'>Ajouter au panier</button></article>";
}


function ajoutPanier(position) {
    total += produits[position][2];
    document.querySelector("#panierProduit").innerHTML += "<div ><img src='" + produits[position][1] + "' style=' width: 50px;' > " + produits[position][0] + " : " + produits[position][2] + " €</div>";
    document.querySelector("#total").innerHTML = "Total : " + total + " €";

}

function payer() {
    var confirmation = document.querySelector("#confirmation");
    confirmation.style.display = "block";
    confirmation.innerHTML = document.querySelector("#panierProduit").innerHTML + "<hr>";
    confirmation.innerHTML += document.querySelector("#total").innerHTML;
    confirmation.innerHTML += '<br><button onclick="annuler(\'#confirmation\');">Annuler</button> <button onclick="validerPanier();">Valider</button>'
}

function validerPanier() {
    document.querySelector("#panierProduit").innerHTML = "";
    document.querySelector("#total").innerHTML = "";
    document.querySelector("#confirmation").style.display = "none";
}


function contact() {
    document.querySelector("#contact").style.display = "block";
}

function loginForm() {
    document.querySelector("#login").style.display = "block";
}

function annuler(selector) {
    document.querySelector(selector).style.display = "none";
}

function envoyer() {

    var nom = document.forms["contactForm"]["nom"].value;
    var prenom = document.forms["contactForm"]["prenom"].value;
    var email = document.forms["contactForm"]["email"].value;
    var tel = document.forms["contactForm"]["tel"].value;
    var message = document.forms["contactForm"]["message"].value;

    if (nom == '' || prenom == '' || email == '' || tel == '' || message == '') {
        alert("Merci de remplir le formulaire correctement");
    } else {
        alert("message envoyé");

        //alert(nom + " " + prenom + " " + tel);
    }
}


function connexion() {
    var monId = "test";
    var monMDP = "1234";
    var identifiant = document.forms["connexionForm"]["identifiant"].value;
    var mdp = document.forms["connexionForm"]["mdp"].value;

    if (identifiant == monId && mdp == monMDP) {
        alert("Connexion OK");
    } else {
        alert("identifiant ou mdp incorrect!");

    }
}