<?php

include_once "./modele/AuthentificationDAO.php";
include_once "./modele/RapportDAO.php";
include_once "./modele/VisiteurDAO.php";
include_once "./modele/MedecinDAO.php";
include_once "./modele/OffrirDAO.php";

// recuperation des donnees GET, POST, et SESSION
$id = $_GET["id"];
$date = $_POST["date"];

//visiteur
$login = AuthentificationDAO::getLoginLoggedOn();
$visiteur = VisiteurDAO::getVisiteurByLogin($login);
$idVisiteur = $visiteur['id'];

//rapports
if($date!=""){
    $listeRapports=RapportDAO::getRapportsByIdVisiteurAndDate($idVisiteur, $date);
}else{
    $listeRapports=RapportDAO::getRapportsByIdVisiteur($idVisiteur);
}


if (AuthentificationDAO::isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
    include "./vue/entete.html.php";
    include "./vue/nav.php";
    include "./vue/listeRapport.php";
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