<?php
include_once "./modele/AunthentificationDAO.php";
include_once "./modele/VisiteurDAO.php";

$ret= VisiteurDAO::ChargeVisiteur();
include "./vue/entete.html.php";
include "./vue/nav.php";
include "./vue/vuProfil.php";
include "./vue/pied.html.php";