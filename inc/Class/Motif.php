<?php

include_once('inc/init.php');

class Motif {

	private $id_motif;
	private $libelle_motif;


	/* Fonction constructeur */
    function __construct($id_motif, $libelle_motif) {
        $this->setId_motif($id_motif) = $id_motif;
        $this->setLibelle_motif($libelle_motif) = $libelle_motif;
    }


    /* Fonctions setter */
    function setId_motif($id_motif) {
        $this->id_motif = $id_motif;
    }

    function setLibelle_motif($libelle_motif) {
        $this->libelle_motif = $libelle_motif;
    }

    /* Fonctions getter */

	 function getId_motif() {
        return $this->id_motif;
    }

    function getLibelle_motif() {
        return $this->libelle_motif;
    }


}