<?php
class Visiteur{
    private $id;
    private $nom;
    private $prenom;
    private $login;
    private $mdp;
    private $adresse;
    private $cp;
    private $ville;
    private $dateEmbauche;
    private $timespan;
    private $ticket;


    public function __construct($unid, $unnom, $unprenom, $unlogin, $unmdp, $uneadresse, $uncp, $uneville, $unedateembauche, $untimespan, $unticket){
        $this->id=$unid;
        $this->nom=$unnom;
        $this->prenom=$unprenom;
        $this->login=$unlogin;
        $this->mdp=$unmdp;
        $this->adresse=$uneadresse;
        $this->cp=$uncp;
        $this->ville=$uneville;
        $this->dateEmbauche=$unedateembauche;
        $this->timespan=$untimespan;
        $this->ticket=$unticket;
    }

    public function getlogin(){
        return $this->login;
    }

    public function getmdp(){
        return $this->mdp;
    }
}
