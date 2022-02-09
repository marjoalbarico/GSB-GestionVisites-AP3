<?php
include_once 'Visiteur.php';
include_once 'ConnexionDAO.php';
class VisiteurDAO {

    public static function ChargeVisiteur(){
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $req = $cnx->prepare("select * from Visiteur");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = new Visiteur($ligne["id"], $ligne["nom"], $ligne["prenom"], $ligne["login"], $ligne["mdp"], $ligne["adresse"], $ligne["cp"], $ligne["ville"], $ligne["dateEmbauche"], $ligne["timespan"], $ligne["ticket"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getVisiteurBylogin($login) {
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $requete = $cnx->prepare("select * from visiteur where login=:login");
            $requete->bindValue(':login', $login, PDO::PARAM_STR);
            $requete->execute();

            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getVisiteurByIdRapport($id) {
        try {
            $cnx = ConnexionDAO::connexionPDO();
            $requete = $cnx->prepare("select * from rapport join visiteur where rapport.idVisiteur=visiteur.id and rapport.id=:id");
            $requete->bindValue(':id', $id, PDO::PARAM_STR);
            $requete->execute();

            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}