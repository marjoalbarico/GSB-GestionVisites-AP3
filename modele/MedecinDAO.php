<?php
include_once 'Medecin.php';
include_once 'ConnexionDAO.php';
class MedecinDAO {

    public static function chargeMedecin(){
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from medecin");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = new Medecin($ligne["id"], $ligne["nom"], $ligne["prenom"], $ligne["adresse"], $ligne["tel"], $ligne["specialitecomplementaire"], $ligne["departement"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static  function getMedecinsByNom($nom) {
        $resultat = array();
        
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from medecin where nom like :nom");
            $req->bindValue(':nom', "%".$nom."%", PDO::PARAM_STR);
    
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

    public static function getMedecins() {
        $resultat = array();

        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from medecin");
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

    public static function getMedecinById($id) {
        
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from medecin where id=:id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
    
            $req->execute();
    
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function updateNomMedecinById($id, $nom) {
        
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("update medecin set nom=upper(:nom) where id=:id");
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':id', $id, PDO::PARAM_INT);
    
            $req->execute();
        return 1;
    }

    public static function updatePrenomMedecinById($id, $prenom) {
        
        $cnx = ConnexionDAO::connexionPDO();
        $req = $cnx->prepare("update medecin set prenom=CONCAT(UCASE(LEFT(:prenom, 1)), SUBSTRING(:prenom, 2)) where id=:id");
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    return 1;
    }

    public static function updateAdresseMedecinById($id, $adresse) {
        
        $cnx = ConnexionDAO::connexionPDO();
        $req = $cnx->prepare("update medecin set adresse=:adresse where id=:id");
        $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    return 1;
    }

    public static function updateTelMedecinById($id, $tel) {
        
        $cnx = ConnexionDAO::connexionPDO();
        $req = $cnx->prepare("update medecin set tel=:tel where id=:id");
        $req->bindValue(':tel', $tel, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    return 1;
    }

    public static function updateSpecMedecinById($id, $specialiteComplementaire) {
        
        $cnx = ConnexionDAO::connexionPDO();
        $req = $cnx->prepare("update medecin set specialiteComplementaire=:specialiteComplementaire where id=:id");
        $req->bindValue(':specialiteComplementaire', $specialiteComplementaire, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    return 1;
    }

    public static function updateDeptMedecinById($id, $departement) {
        
        $cnx = ConnexionDAO::connexionPDO();
        $req = $cnx->prepare("update medecin set departement=:departement where id=:id");
        $req->bindValue(':departement', $departement, PDO::PARAM_INT);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    return 1;
    }

    public static function getMedecinByIdRapport($id) {
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $requete = $cnx->prepare("select * from rapport join medecin where rapport.idmedecin=medecin.id and rapport.id=:id");
            $requete->bindValue(':id', $id, PDO::PARAM_STR);
            $requete->execute();

            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getMedecinByNomPrenom($nom, $prenom) {
        
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from medecin where nom=:nom and prenom=:prenom");
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    
            $req->execute();
    
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

}