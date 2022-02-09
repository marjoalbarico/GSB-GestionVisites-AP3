<?php
    class Medecin{
        private $id;
        private $nom;
        private $prenom;
        private $adresse;
        private $tel;
        private $specialitecomplementaire;
        private $departement;
        
        public function __construct($unid, $unnom, $unprenom, $uneadresse, $untel, $unspe, $undept){
            $this->id=$unid;
            $this->nom=$unnom;
            $this->prenom=$unprenom;
            $this->adresse=$uneadresse;
            $this->tel=$untel;
            $this->specialitecomplementaire=$unspe;
            $this->departement=$undept;
        }
    
        public function getId(){
            return $this->id;
        }

        public function getNom(){
            return $this->nom;
        }

        public function getPrenom(){
            return $this->prenom;
        }

        public function getAdresse(){
            return $this->adresse;
        }

        public function getTel(){
            return $this->tel;
        }

        public function getSpe(){
            return $this->specialitecomplementaire;
        }

        public function getDep(){
            return $this->departement;
        }

    }
?>