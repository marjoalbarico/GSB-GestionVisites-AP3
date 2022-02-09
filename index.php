<?php
include_once './modele/ConnexionDAO.php';
include_once './controleur/controleurPrincipal.php';
ConnexionDAO::connexionPDO();

  if (isset($_GET["action"])) {
    $action = $_GET["action"];
  } 
  else {
    $action = "defaut";
  }

  $fichier = controleurPrincipal($action);
include "controleur/$fichier";
?>
