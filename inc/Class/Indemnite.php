<?php

include_once('inc/init.php');

Class Indemnite {


	private $annee_indemnite;
	private $tarifkilometrique_indemnite

	function __construct($annee_indemnite, $tarifkilometrique_indemnite) {
        $this->setAnnee_indemnite($annee_indemnite) = $annee_indemnite;
        $this->setTarifkilometrique_indemnite($tarifkilometrique_indemnite) = $tarifkilometrique_indemnite;
	}


    function setAnnee_indemnite($annee_indemnite) {
        $this->annee_indemnite = $annee_indemnite;
    }

    function setTarifkilometrique_indemnite($tarifkilometrique_indemnite) {
        $this->tarifkilometrique_indemnite = $tarifkilometrique_indemnite;
    }

    function getAnnee_indemnite() {
        return $this->annee_indemnite;
    }

    function getTarifkilometrique_indemnite() {
        return $this->tarifkilometrique_indemnite;
    }

}

?>