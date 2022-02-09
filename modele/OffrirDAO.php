<?php
include_once 'Offrir.php';
include_once 'ConnexionDAO.php';
class OffrirDAO {

    public static function ChargeOffrir(){
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from offrir");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = new Medecin($ligne["idRapport"], $ligne["idMedicament"], $ligne["quantite"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getOffrir() {
        $resultat = array();

        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from offrir");
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

    public static  function getMedicamentsByIdRapport($idRapport) {
        $resultat = array();
        
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from offrir join medicament where offrir.idMedicament=medicament.id and idRapport=:idRapport");
            $req->bindValue(':idRapport', $idRapport, PDO::PARAM_INT);
    
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

    public static function insertOffert($idRapport, $idMedicament, $quantite){
        $resultat = -1;
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("insert into offrir VALUES (:idRapport , :idMedicament , :quantite);");
            $req->bindValue(':idRapport', $idRapport, PDO::PARAM_INT);
            $req->bindValue(':idMedicament', $idMedicament, PDO::PARAM_STR);
            $req->bindValue(':quantite', $quantite, PDO::PARAM_INT);
            
            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public static function deleteOffertByIdRapport($idRapport) {
        $resultat = -1;
        try {
            $cnx = ConnexionDAO::connexionPDO();
    
            $req = $cnx->prepare("delete from offrir where idRapport=:idRapport");
            $req->bindValue(':idRapport', $idRapport, PDO::PARAM_INT);
            
            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function updateOffert($idRapport, $idMedicament, $quantite){
        $resultat = -1;
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("update offrir SET quantite=:quantite WHERE idRapport=:idRapport and idMedicament=:idMedicament");
            $req->bindValue(':idRapport', $idRapport, PDO::PARAM_INT);
            $req->bindValue(':idMedicament', $idMedicament, PDO::PARAM_STR);
            $req->bindValue(':quantite', $quantite, PDO::PARAM_INT);
            
            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public static function deleteOffertByIdRapportAndIdMedic($idRapport, $idMedicament) {
        $resultat = -1;
        try {
            $cnx = ConnexionDAO::connexionPDO();
    
            $req = $cnx->prepare("delete from offrir where idRapport=:idRapport and idMedicament=:idMedicament");
            $req->bindValue(':idRapport', $idRapport, PDO::PARAM_INT);
            $req->bindValue(':idMedicament', $idMedicament, PDO::PARAM_STR);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}