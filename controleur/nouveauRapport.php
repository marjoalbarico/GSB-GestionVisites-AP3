<?php

include_once "./modele/AuthentificationDAO.php";
include_once "./modele/MedecinDAO.php";
include_once "./modele/Medecin.php";
include_once "./modele/RapportDAO.php";
include_once "./modele/MedicamentDAO.php";
include_once "./modele/OffrirDAO.php";

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeMedecins = MedecinDAO::chargeMedecin();
$listeMedicaments = MedicamentDAO::getMedicaments();

if (AuthentificationDAO::isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
    include "./vue/entete.html.php";
    include "./vue/nav.php";
    include "./vue/nouveauRapportForm.php";
    include "./vue/pied.html.php";
}
else{ // l'utilisateur n'est pas connecté,
    // appel du script de vue 
    $titre = "authentification";
    include "./vue/error.php";
}

?>