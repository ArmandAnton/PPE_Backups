<?php




class Club {


// A MODIF
    private $id_club;
    private $adresse_club;
    private $cp_club;
    private $nompresident_club;
    private $nom_club;
    private $sigle_club;
    private $ville_club;


 	/* Fonction contructeur */ 

      function __construct($id_club, $adresse_club, $cp_club, $nompresident_club, $nom_club, $sigle_club, $ville_club) {
        $this->setId_club($id_club) = $id_club;
        $this->setAdresse_club($adresse_club) = $adresse_club;
        $this->setCp_club($cp_club) = $cp_club;
        $this->setNompresident_club($nompresident_club) = $nompresident_club;
        $this->setNom_club($nom_club) = $nom_club;
        $this->setSigle_club($sigle_club) = $sigle_club;
        $this->setVille_club($ville_club) = $ville_club;
    }


  	/* Fonctions setter */

    function setId_club($id_club) {
        $this->id_club = $id_club;
    }

    function setAdresse_club($adresse_club) {
        $this->adresse_club = $adresse_club;
    }

    function setCp_club($cp_club) {
        $this->cp_club = $cp_club;
    }

    function setNompresident_club($nompresident_club) {
        $this->nompresident_club = $nompresident_club;
    }

    function setNom_club($nom_club) {
        $this->nom_club = $nom_club;
    }

    function setSigle_club($sigle_club) {
        $this->sigle_club = $sigle_club;
    }

    function setVille_club($ville_club) {
        $this->ville_club = $ville_club;
    }


    /* Fonctions getter */

	 function getId_club() {
        return $this->id_club;
    }

    function getAdresse_club() {
        return $this->adresse_club;
    }

    function getCp_club() {
        return $this->cp_club;
    }

    function getNompresident_club() {
        return $this->nompresident_club;
    }

    function getNom_club() {
        return $this->nom_club;
    }

    function getSigle_club() {
        return $this->sigle_club;
    }

    function getVille_club() {
        return $this->ville_club;
    }


}


?>