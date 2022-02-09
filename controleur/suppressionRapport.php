<?php

include_once "./modele/AuthentificationDAO.php";
include_once "./modele/RapportDAO.php";
include_once "./modele/VisiteurDAO.php";
include_once "./modele/MedecinDAO.php";
include_once "./modele/OffrirDAO.php";
include_once "./modele/MedicamentDAO.php";

// recuperation des donnees GET, POST, et SESSION
$id = $_GET["id"];

//supprimer s'il y a des médicaments offerts
OffrirDAO::deleteOffertByIdRapport($id);
RapportDAO::deleteRapportById($id);


include "consulterRapport.php";

?>