<?php
class Medicament{
    private $id;
    private $nomCommercial;
    private $idFamille;
    private $composition;
    private $effets;
    private $contreIndications;


    public function __construct($unId, $unNomCom, $unIdFam, $uneCompo, $unEff, $unContreIndi){
        $this->id=$unId;
        $this->nomCommercial=$unNomCom;
        $this->idFamille=$unIdFam;
        $this->composition=$uneCompo;
        $this->effets=$unEff;
        $this->contreIndications=$unContreIndi;
    }

    public function getId(){
        return $this->id;
    }

    public function getNomCommercial(){
        return $this->nomCommercial;
    }

    public function getIdFamille(){
        return $this->idFamille;
    }
    
    public function getComposition(){
        return $this->composition;
    }
    

}
