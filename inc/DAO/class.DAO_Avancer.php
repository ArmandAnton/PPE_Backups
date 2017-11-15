<?php
error_reporting(E_ALL);

include_once '../connect.php';

$pdo = pdo();

class DAO_Avancer
{
    
/* 

* Fonction find de avancer

*/
    public function find_avancer($id_recu) {

      $sql = "SELECT * FROM avancer WHERE id_recu =:id_recu";

        try {
            $sth = $con->prepare($sql);
            $sth->execute(array(":id_recu" => $id_recu));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            die( "<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }

        $avancer_object = new Avancer($row);

         return $avancer_object;

    }

/* 

* Fonction findall de avancer

*/
    public function findall_avancer() {

          $sql = "SELECT * FROM avancer";

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
              $array[] = new DAO_Avancer($row);
            }
            return $array;


    }
/*

* Fonction update de avancer

*/
    function update_avancer(Avancer $id_recu) {

      $sql = "UPDATE avancer SET annee_indemnite=:annee_indemnite, tarifkilometrique_indemnite=:tarifkilometrique_indemnite";
      try {
        $sth = $con->prepare($sql);
        $sth->execute(
                array(


                    ":annee_indemnite" => $avancer_object->getAnnee_indemnite(),
                    ":tarifkilometrique_indemnite" => $avancer_object->getTarifkilometrique_indemnite()

        ));
        
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }
      $nb = $sth->rowcount();
      return $nb;  // Retourne le nombre de mise à jour
}

/*

* Fonction insert de avancer 

*/

function insert_avancer(Avancer $avancer_object) {
  $sql = "INSERT INTO avancer(id_recu, id_ndf, id_demandeur) VALUES (:id_recu, :id_ndf, :id_demandeur)";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(
            array(
                ":id_recu" => $avancer_object->get_id_recu(),
                ":id_ndf" => $avancer_object->get_id_ndf(),
                ":id_demandeur" => $avancer_object->get_id_demandeur(),
    ));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre d'insertion
}

} 

?>