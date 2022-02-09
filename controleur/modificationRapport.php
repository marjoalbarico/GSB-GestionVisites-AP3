<?php
include_once "./modele/AuthentificationDAO.php";
include_once "./modele/RapportDAO.php";
include_once "./modele/VisiteurDAO.php";
include_once "./modele/MedecinDAO.php";
include_once "./modele/MedicamentDAO.php";
include_once "./modele/OffrirDAO.php";

// recuperation des donnees GET, POST, et SESSION
$id = $_GET["id"];
$idMedSup = $_GET["idMedSup"];

// recuperation des variables du formulaire 
$bilan=$_POST["bilan"];
$motif=$_POST["motif"];
$date=$_POST["date"];
$practicien=$_POST["practicien"];


//separation de $practicien
$nomMed = strtok($practicien, " ");
$prenomMed = substr($practicien, strpos($practicien, " ") + 1);
//recupération d'id de medecin
$leMedecin = MedecinDAO::getMedecinByNomPrenom($nomMed, $prenomMed);
$idMedecin = $leMedecin['id'];

//visiteur
$login = AuthentificationDAO::getLoginLoggedOn();
$visiteur = VisiteurDAO::getVisiteurByLogin($login);
$idVisiteur = $visiteur['id'];

//rapport
$unRapport= RapportDAO::getRapportById($id);
$unMedecin= MedecinDAO::getMedecinByIdRapport($id);

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeMedecins = MedecinDAO::chargeMedecin();
$listeMedicaments = MedicamentDAO::getMedicaments();
$lesMedicamentsOfferts=OffrirDAO::getMedicamentsByIdRapport($id);


//modifications dans la base de données
if ($date!=""){
    RapportDAO::updateDateRapportById($id, $date);
    header("Refresh:0");
}
if ($practicien!="" && $idMedecin!=""){
    RapportDAO::updateMedecinRapportById($id, $idMedecin);
    header("Refresh:0");
}
if ($bilan!=""){
    RapportDAO::updateBilanRapportById($id, $bilan);
    header("Refresh:0");
}
if ($motif!=""){
   RapportDAO::updateMotifRapportById($id, $motif);
   header("Refresh:0");
}
if ($idMedSup!=""){
    $idMedica=MedicamentDAO::getIdMedicByNomCommercial($idMedSup); //recuperation d'id medicament
    $idMedica=$idMedica['id'];
    OffrirDAO::deleteOffertByIdRapportAndIdMedic($id, $idMedica);
}


// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "detail d'un rapport";
include "./vue/entete.html.php";
include "./vue/nav.php";
include "./vue/detailRapport.php";
include "./vue/formModifierDetailRapport.php";
include "./vue/pied.html.php";

?>