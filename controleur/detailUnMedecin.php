<?php
include_once "./modele/MedecinDAO.php";

// recuperation des donnees GET, POST, et SESSION
$id = $_GET["id"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$unMedecin = MedecinDAO::getMedecinById($id);

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "detail d'un medecin";
include "./vue/entete.html.php";
include "./vue/nav.php";
include "./vue/detailMedecin.php";
include "./vue/pied.html.php";

?>