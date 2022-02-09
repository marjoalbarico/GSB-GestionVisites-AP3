<?php
class Offrir{
    private $idRapport;
    private $idMedicament;
    private $quantite;


    public function __construct($unIdR, $unIdMedic, $uneQuan){
        $this->idRapport=$unIdR;
        $this->idMedicament=$unIdMedic;
        $this->quantite=$uneQuant;
    }

    public function getQuantite(){
        return $this->quantite;
    }

}
