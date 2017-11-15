<?php
error_reporting(E_ALL);

include_once '../connect.php';

$pdo = pdo();

class DAO_LigueAffiliation
{

/* 

* Fonction find de ligueAffiliation

*/
    public function find_ligueAffiliation($id_ligue) {

      $sql = "SELECT * FROM ligueAffiliation WHERE id_ligue =:id_ligue";

        try {
            $sth = $con->prepare($sql);
            $sth->execute(array(":id_ligue" => $id_ligue));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            die( "<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }

        $ligueAffiliation_object = new LigueAffiliation($row);

         return $ligueAffiliation_object;

    }

/* 

* Fonction findall de ligueAffiliation

*/
    public function findall_ligueAffiliation() {

          $sql = "SELECT * FROM ligueAffiliation";

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
              $array[] = new DAO_LigueAffiliation($row);
            }
            return $array;


    }
/* 

* Fonction update de ligueAffiliation

*/
    function update_ligueAffiliation(LigueAffiliation $ligueAffiliation_object) {

      $sql = "UPDATE ligueAffiliation SET id_ligue=:id_ligue, libelle_ligue=:libelle_ligue";

      try {
        $sth = $con->prepare($sql);
        $sth->execute(
                array(

                    ":id_ligue" => $ligueAffiliation_object->get_id_ligue(),
                    ":libelle_ligue" => $ligueAffiliation_object->get_libelle_ligue(),

        ));
        
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }
      $nb = $sth->rowcount();
      return $nb;  // Retourne le nombre de mise à jour
}
/* 

* Fonction delete de ligueAffiliation

*/
function delete_ligueAffiliation($id_ligue) {
  $sql = "DELETE FROM ligueAffiliation WHERE id_ligue =:id_ligue";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(array(":id_ligue" => $id_ligue));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre de suppression
}

/* 

* Fonction insert de ligueAffiliation

*/

function insert_ligueAffiliation(LigueAffiliation $ligueAffiliation_object) {

  $sql = "INSERT INTO ligueAffiliation (id_ligue, libelle_ligue) VALUES (:id_ligue, :libelle_ligue)";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(
            array(
                    ":id_ligue" => $ligueAffiliation_object->get_id_ligue(),
                    ":libelle_ligue" => $ligueAffiliation_object->get_libelle_ligue(),
    ));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre d'insertion
}

} 

?>