<?php
error_reporting(E_ALL);

include_once '../connect.php';

$pdo = pdo();

class DAO_Demandeur
{
    
/* id_demandeur = id */ 

/* 

* Fonction find de demandeur

*/
    public function find_demandeur($id_demandeur) {

      $sql = "SELECT * FROM demandeur WHERE id_demandeur =:id_demandeur";

        try {
            $sth = $con->prepare($sql);
            $sth->execute(array(":id_demandeur" => $id_demandeur));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            die( "<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }

        $demandeur_object = new Demandeur($row);

         return $demandeur_object;

    }

/* 

* Fonction findall de demandeur

*/
    public function findall_demandeur() {

          $sql = "SELECT * FROM demandeur";

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
              $array[] = new DAO_Demandeur($row);
            }
            return $array;


    }
/* 

* Fonction update de demandeur

*/
    function update_demandeur(Demandeur $demandeur_object) {

      $sql = "UPDATE demandeur SET id_demandeur =:id_demandeur ,motdepasse_demandeur =:motdepasse_demandeur, mail_demandeur =:mail_demandeur";
      try {
        $sth = $con->prepare($sql);
        $sth->execute(
                array(

                    ":id_demandeur" => $demandeur_object->get_id_demandeur(),
                    ":motdepasse_demandeur" => $demandeur_object->get_motdepasse_demandeur()
                    ":mail_demandeur" => $demandeur_object->get_mail_demandeur()

        ));
        
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }
      $nb = $sth->rowcount();
      return $nb;  // Retourne le nombre de mise à jour
}
/* 

* Fonction delete de demandeur

*/
function delete_demandeur($id_demandeur) {
  $sql = "DELETE FROM demandeur WHERE id_demandeur =:id_demandeur";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(array(":id_demandeur" => $id_demandeur));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre de suppression
}

/* 

* Fonction insert de demandeur

*/function insert_demandeur(Demandeur $demandeur_object) {

  $sql = "INSERT INTO demandeur(id_demandeur,motdepasse_demandeur,mail_demandeur ) VALUES (:id_demandeur, :motdepasse_demandeur, :mail_demandeur)";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(
            array(
                 ":id_demandeur" => $demandeur_object->get_id_demandeur(),
                 ":motdepasse_demandeur" => $demandeur_object->get_motdepasse_demandeur()
                 ":mail_demandeur" => $demandeur_object->get_mail_demandeur(
                
    ));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre d'insertion
}

} 

?>