<?php

include_once "./modele/AuthentificationDAO.php";

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["login"]) && isset($_POST["mdp"])){
    $login=$_POST["login"];
    $mdp=$_POST["mdp"];
}
else
{
    $login="";
    $mdp="";
}

// traitement si necessaire des donnees recuperees
if($login !=""){
    AuthentificationDAO::login($login,$mdp);
}
if (AuthentificationDAO::isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
    include "./vue/entete.html.php";
    include "./vue/nav.php";
    include "./vue/vuProfil.php";
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