<?php

include_once "./modele/AuthentificationDAO.php";

AuthentificationDAO::logout();

include "./vue/entete.html.php";
include "./vue/form.php";
include "./vue/pied.html.php";