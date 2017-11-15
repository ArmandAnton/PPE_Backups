<?php
error_reporting(E_ALL);

include_once '../connect.php';

$pdo = pdo();

class DAO_Indemnite
{

/* 

* Fonction find de indemnite

*/
    public function find_indemnite($annee_indemnite) {

      $sql = "SELECT * FROM indemnite WHERE annee_indemnite =:annee_indemnite";

        try {
            $sth = $con->prepare($sql);
            $sth->execute(array(":annee_indemnite" => $annee_indemnite));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            die( "<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }

        $indemnite_object = new Indemnite($row);

         return $indemnite_object;

    }

/* 

* Fonction findall de indemnite

*/
    public function findall_indemnite() {

          $sql = "SELECT * FROM indemnite";

            try {
              $sth = $con->prepare($sql);
              $sth->execute();
              $rows = $sth->fetchAll(PDO::FETCH_ASSOC);

            } 
            catch (PDOException $e) {
              throw new Exception( "<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
            }
            $array = array();
            foreach ($rows as $row) {
              $array[] = new DAO_Indemnite($row);
            }
            return $array;


    }
/* 

* Fonction update de indemnite

*/
    function update_indemnite(Indemnite $annee_indemnite) {

      $sql = "UPDATE indemnite SET annee_indemnite=:annee_indemnite, tarifkilometrique_indemnite=:tarifkilometrique_indemnite";

      try {
        $sth = $con->prepare($sql);
        $sth->execute(
                array(

                ":annee_indemnite" => $indemnite_object->getAnnee_indemnite(),
                ":tarifkilometrique_indemnite" => $indemnite_object->getTarifkilometrique_indemnite()

        ));
        
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }
      $nb = $sth->rowcount();
      return $nb;  // Retourne le nombre de mise à jour
}
/* 

* Fonction delete de indemnite

*/
/*
function delete_indemnite($annee_indemnite) {
  $sql = "DELETE FROM indemnite WHERE annee_indemnite =:annee_indemnite";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(array(":annee_indemnite" => $annee_indemnite));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre de suppression
}
/*

/* 

* Fonction insert de indemnite

*/

function insert_indemnite(Indemnite $indemnite_object) {

  $sql = "INSERT INTO indemnite (annee_indemnite, tarifkilometrique_indemnite) VALUES (:annee_indemnite, :tarifkilometrique_indemnite)";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(
            array(
                ":annee_indemnite" => $indemnite_object->getAnnee_indemnite(),
                ":tarifkilometrique_indemnite" => $indemnite_object->getTarifkilometrique_indemnite()
    ));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre d'insertion
}

} 

?>