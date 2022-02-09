<?php
include_once "./modele/MedecinDAO.php";

// recuperation des donnees GET, POST, et SESSION
$id = $_GET["id"];

// recuperation des variables du formulaire 
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$tel=$_POST["tel"];
$specialiteComplementaire=$_POST["specialiteComplementaire"];
$departement=$_POST["departement"];
$adresse=$_POST["adresse"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$unMedecin = MedecinDAO::getMedecinById($id);

//modifications dans la base de données
if ($nom!=""){
    MedecinDAO::updateNomMedecinById($id, $nom);
    header("Refresh:0");
}
if ($prenom!=""){
    MedecinDAO::updatePrenomMedecinById($id, $prenom);
    header("Refresh:0");
}
if ($adresse!=""){
    MedecinDAO::updateAdresseMedecinById($id, $adresse);
    header("Refresh:0");
}
if ($tel!=""){
    MedecinDAO::updateTelMedecinById($id, $tel);
    header("Refresh:0");
}
if ($specialiteComplementaire!=""){
    MedecinDAO::updateSpecMedecinById($id, $specialiteComplementaire);
    header("Refresh:0");
}
if ($departement!=""){
    MedecinDAO::updateDeptMedecinById($id, $departement);
    header("Refresh:0");
}

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "detail d'un medecin";
include "./vue/entete.html.php";
include "./vue/nav.php";
include "./vue/detailMedecin.php";
include "./vue/formModifierDetailMedecin.php";
include "./vue/pied.html.php";

?>