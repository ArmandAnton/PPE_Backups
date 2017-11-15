<?php

include_once('inc/init.php');


class Demandeur {



// A MODIF


    private $numlicense_adherent;
    private $adresseMail;
    private $cp;
    private $dateNaissance;
    private $nom;
    private $prenom;
    private $rue;
    private $ville;

  	/* Fonction contructeur */

    function __construct($id_demandeur, $mail_demandeur, $motdepasse_demandeur) {
        $this->setId_demandeur($id_demandeur) = $id_demandeur;
        $this->setMail_demandeur($mail_demandeur) = $mail_demandeur;
        $this->setMotdepasse_demandeur($motdepasse_demandeur) = $motdepasse_demandeur;
    }


  	/* Fonctions setter */

    function setId_demandeur($id_demandeur) {
        $this->id_demandeur = $id_demandeur;
    }

    function setMail_demandeur($mail_demandeur) {
        $this->mail_demandeur = $mail_demandeur;
    }

    function setMotdepasse_demandeur($motdepasse_demandeur) {
        $this->motdepasse_demandeur = $motdepasse_demandeur;
    }

 	/* Fonctions getter */

    function getId_demandeur() {
        return $this->id_demandeur;
    }

    function getMail_demandeur() {
        return $this->mail_demandeur;
    }

    function getMotdepasse_demandeur() {
        return $this->motdepasse_demandeur;
    }




?>