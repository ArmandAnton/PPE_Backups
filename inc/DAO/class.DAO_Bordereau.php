<?php
error_reporting(E_ALL);

include_once '../connect.php';

$pdo = pdo();

class DAO_Bordereau
{
    
/* id_ndf = id */ 

/* 

* Fonction find de bordereau

*/
    public function find_bordereau($id_ndf) {

      $sql = "SELECT * FROM bordereau WHERE id_ndf =:id_ndf";

        try {
            $sth = $con->prepare($sql);
            $sth->execute(array(":id_ndf" => $id_ndf));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            die( "<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }

        $bordereau_object = new Bordereau($row);

         return $bordereau_object;

    }

/* 

* Fonction findall de bordereau

*/
    public function findall_bordereau() {

          $sql = "SELECT * FROM bordereau";

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
              $array[] = new DAO_Bordereau($row);
            }
            return $array;


    }
/* 

* Fonction update de bordereau

*/
    function update_bordereau(Bordereau $bordereau_object) {

      $sql = "UPDATE bordereau SET id_ndf =:id_ndf ,annee_indemnite =:annee_indemnite";
      try {
        $sth = $con->prepare($sql);
        $sth->execute(
                array(

                    ":id_ndf" => $bordereau_object->get_id_ndf(),
                    ":annee_indemnite" => $bordereau_object->get_annee_indemnite()

        ));
        
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }
      $nb = $sth->rowcount();
      return $nb;  // Retourne le nombre de mise à jour
}
/* 

* Fonction delete de bordereau

*/
function delete_bordereau($id_ndf) {
  $sql = "DELETE FROM bordereau WHERE id_ndf =:id_ndf";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(array(":id_ndf" => $id_ndf));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre de suppression
}

/* 

* Fonction insert de bordereau

*/
function insert_bordereau(Bordereau $bordereau_object) {

  $sql = "INSERT INTO bordereau(id_ndf, ) VALUES (:id_ndf, :annee_indemnite)";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(
            array(
                ":id_ndf" => $bordereau_object->get_id_ndf(),
                ":annee_indemnite" => $bordereau_object->get_annee_indemnite()
                
    ));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre d'insertion
}

} 

?>