<?php

include_once('inc/init.php');

class Representant {

    private $id_representant;
    private $cp_representant;
    private $nom_representant;
    private $prenom_representant;
    private $rue_representant;
    private $ville_representant;


    /* Fonction constructeur */     
    function __construct($id_representant, $cp_representant, $nom_representant, $prenom_representant, $rue_representant, $ville_representant) {
        $this->setId_representant($id_representant) = $id_representant;
        $this->setCp_representant($cp_representant) = $cp_representant;
        $this->setNom_representant($nom_representant) = $nom_representant;
        $this->setPrenom_representant($prenom_representant) = $prenom_representant;
        $this->setRue_representant($rue_representant) = $rue_representant;
        $this->setVille_representant($ville_representant) = $ville_representant;
    }

    /* Fonctions setter */

    function setId_representant($id_representant) {
        $this->id_representant = $id_representant;
    }

    function setCp_representant($cp_representant) {
        $this->cp_representant = $cp_representant;
    }

    function setNom_representant($nom_representant) {
        $this->nom_representant = $nom_representant;
    }

    function setPrenom_representant($prenom_representant) {
        $this->prenom_representant = $prenom_representant;
    }

    function setRue_representant($rue_representant) {
        $this->rue_representant = $rue_representant;
    }

    function setVille_representant($ville_representant) {
        $this->ville_representant = $ville_representant;
    }

    /* Fonctions getter */

    function getId_representant() {
    	return $this->id_representant;
    }

    function getCp_representant() {
        return $this->cp_representant;
    }

    function getNom_representant() {
        return $this->nom_representant;
    }

    function getPrenom_representant() {
        return $this->prenom_representant;
    }

    function getRue_representant() {
        return $this->rue_representant;
    }

    function getVille_representant() {
        return $this->ville_representant;
    }

}