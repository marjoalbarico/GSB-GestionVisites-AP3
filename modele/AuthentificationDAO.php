<?php
include_once "VisiteurDAO.php";

class AuthentificationDAO{
    public static function login($login, $mdp) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $util= VisiteurDAO::getVisiteurBylogin($login);
        $mdpBD = $util["mdp"];
        if ($mdpBD == $mdp) {
            // le mot de passe est celui de l'Visiteur dans la base de donnees
            $_SESSION["login"] = $login;
            $_SESSION["mdp"] = $mdpBD;
            $_SESSION["nom"] = $util["nom"];
            $_SESSION["prenom"]=$util["prenom"];
            $_SESSION["id"]=$util["id"];
        }else{
            echo "login ou mot de passe est incorrect";
        }
    }

    public static function logout() {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION["login"]);
        unset($_SESSION["mdp"]);
    }

    public static function getloginLoggedOn(){
        if (AuthentificationDAO::isLoggedOn()){
            $ret = $_SESSION["login"];
        }
        else {
            $ret = "";
        }
        return $ret;
            
    }

    public static function getLastNLoggedOn(){
        if (AuthentificationDAO::isLoggedOn()){
            $ret = $_SESSION["prenom"];
        }
        else {
            $ret = "";
        }
        return $ret;
            
    }

    public static function getNameLoggedOn(){
        if (AuthentificationDAO::isLoggedOn()){
            $ret = $_SESSION["nom"];
        }
        else {
            $ret = "";
        }
        return $ret;
            
    }

    public static function getIdLoggedOn(){
        if (AuthentificationDAO::isLoggedOn()){
            $ret = $_SESSION["id"];
        }
        else {
            $ret = "";
        }
        return $ret;
            
    }

    public static function isLoggedOn() {
        if (!isset($_SESSION)) {
            session_start();
        }
        $ret = false;

        if (isset($_SESSION["login"])) {
            $util = VisiteurDAO::getVisiteurBylogin($_SESSION["login"]);
            if ($util["login"] == $_SESSION["login"] && $util["mdp"] == $_SESSION["mdp"]) {
                $ret = true;
            }
        }
        return $ret;
    }


}