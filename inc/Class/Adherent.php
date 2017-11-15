<?php

include_once('inc/init.php');

class Adherent {

    private $numlicense_adherent;
    private $adresseMail;
    private $cp;
    private $dateNaissance;
    private $nom;
    private $prenom;
    private $rue;
    private $ville;

  /* Fonction contructeur */ 

	function __construct($numlicense_adherent, $adresseMail, $cp, $dateNaissance, $nom, $prenom, $rue, $ville)

	{
		$this->setNumlicense_adherent($numlicense_adherent);
		$this->setAdresseMail($adresseMail);
		$this->setCp($cp);
		$this->setDateNaissance($dateNaissance);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setRue($rue);
        $this->setVille($ville);

	}

  /* Fonctions setter */
    function setNumlicense_adherent($numlicense_adherent) {
        $this->numlicense_adherent = $numlicense_adherent;
    }

    function setAdresseMail($adresseMail) {
        $this->adresseMail = $adresseMail;
    }

    function setCp($cp) {
        $this->cp = $cp;
    }

    function setDateNaissance($dateNaissance) {
        $this->dateNaissance = $dateNaissance;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setRue($rue) {
        $this->rue = $rue;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    /* Fonctions getter */
    function getNumlicense_adherent() {
        return $this->numlicense_adherent;
    }

    function getAdresseMail() {
        return $this->adresseMail;
    }

    function getCp() {
        return $this->cp;
    }

    function getDateNaissance() {
        return $this->dateNaissance;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getRue() {
        return $this->rue;
    }

    function getVille() {
        return $this->ville;
    }

}

?>