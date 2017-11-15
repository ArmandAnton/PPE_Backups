<?php
error_reporting(E_ALL);

include_once '../connect.php';

$pdo = pdo();

class DAO_LigneDeFrais
{
    
/* id_lf = id */ 

/* 

* Fonction find de lf

*/
    public function find_lf($id_lf) {

      $sql = "SELECT * FROM lignefrais WHERE id_lf =:id_lf";

        try {
            $sth = $con->prepare($sql);
            $sth->execute(array(":id_lf" => $id_lf));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            die( "<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }

        $lf_object = new LigneDeFrais($row);

         return $lf_object;

    }

/* 

* Fonction findall de lf

*/
    public function findall_lf() {

          $sql = "SELECT * FROM lignefrais";

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
              $array[] = new DAO_LigneDeFrais($row);
            }
            return $array;


    }
/* 

* Fonction update de lf

*/
    function update_lf(LigneFrais $lf_object) {

      $sql = "UPDATE lignefrais SET id_lf =:id_lf ,couthebergement_lf =:couthebergement_lf, coutpeage_lf =:coutpeage_lf, coutrepas_lf=:coutrepas_lf, datetrajet =:datetrajet";
      try {
        $sth = $con->prepare($sql);
        $sth->execute(
                array(

                    ":id_lf" => $lf_object->getId_lf(),
                    ":couthebergement_lf" => $lf_object->getCouthebergement_lf()
                    ":coutpeage_lf" => $lf_object->getCoutpeage_lf()
                    ":coutrepas_lf" => $lf_object->getCoutrepas_lf()
                    ":datetrajet" => $lf_object->getDatetrajet_lf()
                    ":id_lf" => $lf_object->getId_lf()
                    ":id_motif" => $lf_object->getId_motif()
                    ":km_lf" => $lf_object->getKm_lf()


        ));
        
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }
      $nb = $sth->rowcount();
      return $nb;  // Retourne le nombre de mise à jour
}
/* 

* Fonction delete de lf

*/
function delete_lf($id_lf) {
  $sql = "DELETE FROM lignefrais WHERE id_lf =:id_lf";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(array(":id_lf" => $id_lf));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre de suppression
}

/* 

* Fonction insert de lf

*/function insert_lf(LigneFrais $lf_object) {

  $sql = "INSERT INTO lignefrais(id_lf,couthebergement_lf,coutpeage_lf,coutrepas_lf,datetrajet,id_lf,id_motif,km_lf ) VALUES (:id_lf, :couthebergement_lf, :coutpeage_lf, :coutrepas_lf, :datetrajet, :id_lf, :id_motif, :km_lf)";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(
            array(
                 ":id_lf" => $lf_object->getId_lf(),
                 ":couthebergement_lf" => $lf_object->getCouthebergement_lf()
                 ":coutpeage_lf" => $lf_object->getCoutpeage_lf()
                 ":coutrepas_lf" => $lf_object->getCoutrepas_lf()
                 ":datetrajet" => $lf_object->getDatetrajet_lf()
                 ":id_lf" => $lf_object->getId_lf()
                 ":id_motif" => $lf_object->getId_motif()
                 ":km_lf" => $lf_object->getKm_lf()(
                
    ));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre d'insertion
}

} 

?>