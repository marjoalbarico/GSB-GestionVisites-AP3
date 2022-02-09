<?php
function controleurPrincipal($action) {
    $lesActions = array();
    //principal et fiche
    $lesActions["defaut"] = "seconnecter.php";

    //controller session (deconnexion, connexion, inscription et profil)
    $lesActions["connexion"] = "seconnecter.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["nouveauRapport"] = "nouveauRapport.php";
    $lesActions["consulterRapport"] = "consulterRapport.php";
    $lesActions["enregistreRapport"] = "enregistreRapport.php";
    $lesActions["consulterMedecin"] = "consulterMedecin.php";
    $lesActions["chercherMedecin"] = "consulterMedecin.php";
    $lesActions["detailUnMedecin"] = "detailUnMedecin.php";
    $lesActions["rapportsMedecin"] = "rapportsMedecin.php";
    $lesActions["modifierMedecin"] = "modificationMedecin.php";
    $lesActions["detailRapport"] = "detailRapport.php";
    $lesActions["modifierRapport"] = "modificationRapport.php";
    $lesActions["supprimerRapport"] = "suppressionRapport.php";


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>