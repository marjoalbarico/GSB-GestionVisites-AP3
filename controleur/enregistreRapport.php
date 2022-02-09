<?php

include_once "./modele/AuthentificationDAO.php";
include_once "./modele/MedecinDAO.php";
include_once "./modele/RapportDAO.php";
include_once "./modele/VisiteurDAO.php";
include_once "./modele/MedicamentDAO.php";
include_once "./modele/OffrirDAO.php";

// recuperation des variables du formulaire 
$date = $_POST['date'];
$practicien=$_POST["practicien"];
$motif = $_POST['motif'];
$bilan = $_POST['bilan'];
$quantite=$_POST["mynumber"];
$medic=$_POST['mytext'];
$sansMedicCheckbox=$_POST['sansMedicCheckbox'];

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

//verification si tt les qtt et medic sont corrects
$noEmptyQ=false;
$noEmptyM=false;
$medicDuplicates=false;

//verification que tout les quantités = rempli
foreach($quantite as $number){      
    if ($number==""){
        $noEmptyQ=true;
    }
}

//verification que tout les medicaments = rempli
foreach($medic as $text){      
    if ($text==""){
        $noEmptyM=true;
    }
}

//verification que $medic n'a que des valeurs uniques
if(count(array_unique($medic)) < count($medic)){ 
    $medicDuplicates=true;
}

//verification que les champs sont remplis correctement
$rapportOK=false;

if (!empty($date) && !empty($practicien) && !empty($motif) && !empty($bilan)) {
    //rapport sans medic
    if($sansMedicCheckbox=="true" && $noEmptyQ==true && $noEmptyM==true){
        // sauvgarde de ce rapport
        RapportDAO::insertNouveauRapport($date, $motif, $bilan, $idVisiteur, $idMedecin);
        $rapportOK=true;
    }elseif ($sansMedicCheckbox=="false" && $noEmptyQ==false && $noEmptyM==false && $medicDuplicates==false && count($medic)==count($quantite)){ //rapport avec medic
        // sauvgarde de ce rapport
        RapportDAO::insertNouveauRapport($date, $motif, $bilan, $idVisiteur, $idMedecin);
        //get id rapport
        $idRapport=RapportDAO::getIdLastRapport($idVisiteur);
        $idRapport=$idRapport['max(id)'];
    
        for ($k=0; $k<count($medic); $k++){
            $idMedicament=MedicamentDAO::getIdMedicByNomCommercial($medic[$k]); //recuperation d'id medicament
            $idMedicament=$idMedicament['id'];
            OffrirDAO::insertOffert($idRapport, $idMedicament, $quantite[$k]);
        }

        $rapportOK=true;
    }
    else{
        $rapportOK=false;
    }
    
}
$idRapport=RapportDAO::getIdLastRapport($idVisiteur);
$idRapport=$idRapport['max(id)'];
//affichage
if (AuthentificationDAO::isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
    include "./vue/entete.html.php";
    include "./vue/nav.php";
    if($rapportOK==true){
        include "./vue/rapportConfirmation.php";
    }else{
        // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
        $listeMedecins = MedecinDAO::chargeMedecin();
        $listeMedicaments = MedicamentDAO::getMedicaments();
        include "./vue/rapportErreurText.php";
        include "./vue/nouveauRapportForm.php";
    }
    include "./vue/pied.html.php";
}

?>