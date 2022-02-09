<?php
include_once "./modele/MedecinDAO.php";
include_once "./modele/AuthentificationDAO.php";
include_once "./modele/RapportDAO.php";
include_once "./modele/VisiteurDAO.php";
include_once "./modele/MedicamentDAO.php";
include_once "./modele/OffrirDAO.php";


// recuperation des donnees GET, POST, et SESSION
$id = $_GET["id"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
//medecin
$medecin=MedecinDAO::getMedecinById($id);
$idMedecin=$medecin['id'];

//visiteur
$login = AuthentificationDAO::getLoginLoggedOn();
$visiteur = VisiteurDAO::getVisiteurByLogin($login);
$idVisiteur = $visiteur['id'];

//rapports
$listeRapports=RapportDAO::getRapportsByIdMedecin($idMedecin);

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "detail d'un medecin";
include "./vue/entete.html.php";
include "./vue/nav.php";
include "./vue/listeRapportsMedecin.php";
include "./vue/pied.html.php";

?>