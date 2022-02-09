<?php
include_once 'Rapport.php';
include_once 'ConnexionDAO.php';
class RapportDAO {

    public static function ChargeRapport(){
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from rapport");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = new Rapport($ligne["id"], $ligne["date"], $ligne["motif"], $ligne["bilan"], $ligne["idVisiteur"], $ligne["idMedecin"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getRapports() {
        $resultat = array();
    
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from rapport");
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

    public static function getMotifsRapports() {
        $resultat = array();
    
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select distinct motif from rapport");
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

    public static function getRapportsByIdMedecin($idMedecin) {
        $resultat = array();
    
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from rapport where idMedecin=:idMedecin");
            $req->bindValue(':idMedecin', $idMedecin, PDO::PARAM_INT);
    
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

    public static function getRapportsByIdVisiteur($idVisiteur) {
        $resultat = array();
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from rapport where idVisiteur=:idVisiteur");
            $req->bindValue(':idVisiteur', $idVisiteur, PDO::PARAM_STR);
    
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

    public static function getRapportsByIdVisiteurAndDate($idVisiteur, $date) {
        $resultat = array();
    
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from rapport where idVisiteur=:idVisiteur and date=:date");
            $req->bindValue(':idVisiteur', $idVisiteur, PDO::PARAM_INT);
            $req->bindValue(':date', $date, PDO::PARAM_STR);
    
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

    public static function getRapportById($id) {
        
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("SELECT * FROM rapport, medecin where rapport.idMedecin=medecin.id and rapport.id=:id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
    
            $req->execute();
    
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function updateBilanRapportById($id, $bilan) {
        
        $cnx = ConnexionDAO::connexionPDO();
        $req = $cnx->prepare("update rapport set bilan=:bilan where id=:id");
        $req->bindValue(':bilan', $bilan, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    return 1;
    }

    public static function updateMotifRapportById($id, $motif) {
        
        $cnx = ConnexionDAO::connexionPDO();
        $req = $cnx->prepare("update rapport set motif=:motif where id=:id");
        $req->bindValue(':motif', $motif, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    return 1;
    }

    public static function updateMedecinRapportById($id, $idMedecin) {
        
        $cnx = ConnexionDAO::connexionPDO();
        $req = $cnx->prepare("update rapport set idMedecin=:idMedecin where id=:id");
        $req->bindValue(':idMedecin', $idMedecin, PDO::PARAM_INT);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    return 1;
    }

    public static function updateDateRapportById($id, $date) {
        
        $cnx = ConnexionDAO::connexionPDO();
        $req = $cnx->prepare("update rapport set date=:date where id=:id");
        $req->bindValue(':date', $date, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    return 1;
    }

    public static function insertNouveauRapport($date, $motif, $bilan, $idVisiteur, $idMedecin){
        $resultat = -1;
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("insert into rapport (date, motif, bilan, idVisiteur, idMedecin) VALUES (:date , :motif , :bilan , :idVisiteur , :idMedecin);");
            $req->bindValue(':date', $date, PDO::PARAM_STR);
            $req->bindValue(':motif', $motif, PDO::PARAM_STR);
            $req->bindValue(':bilan', $bilan, PDO::PARAM_STR);
            $req->bindValue(':idVisiteur', $idVisiteur, PDO::PARAM_STR);
            $req->bindValue(':idMedecin', $idMedecin, PDO::PARAM_INT);
            
            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public static function getIdLastRapport($idVisiteur) {
        
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("SELECT max(id) FROM rapport where idVisiteur=:idVisiteur");
            $req->bindValue(':idVisiteur', $idVisiteur, PDO::PARAM_STR);
    
            $req->execute();
    
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function deleteRapportById($id) {
        $resultat = -1;
        try {
            $cnx = ConnexionDAO::connexionPDO();
    
            $req = $cnx->prepare("delete from rapport where id=:id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            
            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}