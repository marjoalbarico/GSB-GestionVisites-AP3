<?php
include_once 'Medicament.php';
include_once 'ConnexionDAO.php';
class MedicamentDAO {

    public static function ChargeMedicament(){
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from medicament");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = new Medecin($ligne["id"], $ligne["nomCommercial"], $ligne["idFamille"], $ligne["composition"], $ligne["effets"], $ligne["contreIndications"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getMedicaments() {
        $resultat = array();

        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from medicament");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = $ligne;
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getIdMedicByNomCommercial($nomCommercial) {
        $resultat = array();
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("SELECT * FROM medicament where nomCommercial=:nomCommercial");
            $req->bindValue(':nomCommercial', $nomCommercial, PDO::PARAM_STR);
    
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
        
    }
    



}