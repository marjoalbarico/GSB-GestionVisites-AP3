<?php

include_once "./modele/AuthentificationDAO.php";
include_once "./modele/MedecinDAO.php";

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["nom"])){
    $nom=$_POST["nom"];
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
if($nom!=""){
    $listeMedecins = MedecinDAO::getMedecinsByNom($nom);
}
else{
    $listeMedecins = MedecinDAO::getMedecins();
}

if (AuthentificationDAO::isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
    include "./vue/entete.html.php";
    include "./vue/nav.php";
    include "./vue/listeMedecins.php";
    include "./vue/pied.html.php";
}
else{ // l'utilisateur n'est pas connecté,
    // appel du script de vue 
    $titre = "authentification";
    include "./vue/entete.html.php";
    include "./vue/form.php";
    include "./vue/pied.html.php";
}

?>