<?php

include_once('inc/init.php');

class LigueAffiliation {



// A MODIF


    private $id_ligue;
    private $id_recu;
    

  	/* Fonction contructeur */

    function __construct($id_ligue, $id_recu) {
        $this->setId_ligue($id_ligue) = $id_ligue;
        $this->setId_recu($id_recu) = $id_recu;
    }


  	/* Fonctions setter */

    function setId_ligue($id_ligue) {
        $this->id_ligue = $id_ligue;
    }

    function setId_recu($id_recu) {
        $this->id_recu = $id_recu;
    }

 	/* Fonctions getter */

    function getId_ligue() {
        return $this->id_ligue;
    }

    function getId_recu() {
        return $this->id_recu;
    }

?>