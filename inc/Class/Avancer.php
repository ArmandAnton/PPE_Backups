<?php

include_once('inc/init.php');


class Avancer {

	private $id_demandeur;
	private $id_ndf;
    private $id_recu;


	/* Fonction constructeur */
    function __construct($id_demandeur, $id_ndf, $id_recu) {
        $this->setId_demandeur($id_demandeur) = $id_demandeur;
        $this->setId_ndf($id_ndf) = $id_ndf;
        $this->setId_recu($id_recu) = $id_recu;
    }


    /* Fonctions setter */
    function setId_demandeur($id_demandeur) {
        $this->id_demandeur = $id_demandeur;
    }

    function setId_ndf($id_ndf) {
        $this->id_ndf = $id_ndf;
    }

     function setId_recu($id_recu) {
        $this->id_recu = $id_recu;
    }

    /* Fonctions getter */

	 function getId_demandeur() {
        return $this->id_demandeur;
    }

    function getId_ndf() {
        return $this->id_ndf;
    }

    function getId_recu() {
        return $this->id_recu;
    }


}