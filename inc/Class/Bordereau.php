<?php

include_once('inc/init.php');


class Bordereau {



// A MODIF


    private $annee_indemnite;
    private $id_ndf;
    

  	/* Fonction contructeur */

    function __construct($annee_indemnite, $id_ndf) {
        $this->setAnnee_indemnite($annee_indemnite) = $annee_indemnite;
        $this->setId_ndf($id_ndf) = $id_ndf;
    }


  	/* Fonctions setter */

    function setAnnee_indemnite($annee_indemnite) {
        $this->annee_indemnite = $annee_indemnite;
    }

    function setId_ndf($id_ndf) {
        $this->id_ndf = $id_ndf;
    }

 	/* Fonctions getter */

    function getAnnee_indemnite() {
        return $this->annee_indemnite;
    }

    function getId_ndf() {
        return $this->id_ndf;
    }

?>