<?php
error_reporting(E_ALL);

include_once '../connect.php';

$pdo = pdo();

class DAO_Adherent
{
	
/* numlicense_adherent = id */ 

/* 

* Fonction find de adherent

*/
    public function find_adherent($numlicense_adherent) {

      $sql = "SELECT * FROM adherent WHERE numlicense_adherent =:numlicense_adherent";

        try {
            $sth = $con->prepare($sql);
            $sth->execute(array(":numlicense_adherent" => $numlicense_adherent));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            die( "<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }

        $adherent_object = new Adherent($row);

         return $adherent_object;

    }

/* 

* Fonction findall de adherent

*/
    public function findall_adherent() {

          $sql = "SELECT * FROM adherent";

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
              $array[] = new DAO_Adherent($row);
            }
            return $array;


    }
/* 

* Fonction update de adherent

*/
    function update_adherent(Adherent $adherent_object) {

      $sql = "UPDATE adherent SET numlicense_adherent =:numlicense_adherent ,Nom =:Nom ,Prenom =:Prenom ,dateNaissance =:dateNaissance ,Rue =:Rue ,Cp =:Cp ,Ville =:Vile ,adresseMail =:adresseMail ,id_demandeur =:id_demandeur ,id_club =:id_club ,id_representant =:id_representant ";
      try {
        $sth = $con->prepare($sql);
        $sth->execute(
                array(

                    ":numlicense_adherent" => $adherent_object->get_id_ferry(),
                    ":Nom" => $adherent_object->get_nom(),
                    ":Prenom" => $adherent_object->get_compagnie(),
                    ":dateNaissance" => $adherent_object->get_longueur(),
                    ":Rue" => $adherent_object->get_nb_passagers(),
                    ":Cp" => $adherent_object->get_nb_vehicules(),
                    ":Ville" => $adherent_object->get_est_amarre(),
                    ":adresseMail" => $adherent_object->get_nm(),
                    ":id_demandeur" => $adherent_object->get_km(),
                    ":id_club" => $adherent_object->get_vitesse(),
                    ":id_representant" => $adherent_object->get_id_representant()

        ));
        
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }
      $nb = $sth->rowcount();
      return $nb;  // Retourne le nombre de mise à jour
}
/* 

* Fonction delete de adherent

*/
function delete_adherent($numlicense_adherent) {
  $sql = "DELETE FROM adherent WHERE numlicense_adherent =:numlicense_adherent";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(array(":numlicense_adherent" => $numlicense_adherent));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre de suppression
}

/* 

* Fonction insert de adherent

*/function insert_adherent(Adherent $adherent_object) {

  $sql = "INSERT INTO adherent(numlicense_adherent, Nom, Prenom, dateNaissance, Rue, Cp, Ville, adresseMail, id_demandeur, id_club, id_representant) VALUES (:numlicense_adherent, :Nom, :Prenom, :dateNaissance, :Rue, :Cp, :Ville, :adresseMail, :id_demandeur, :id_club, :id_representant)";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(
            array(
                ":numlicense_adherent" => $adherent_object->get_numlicense_adherent(),
                ":Nom" => $adherent_object->get_Nom(),
                ":Prenom" => $adherent_object->get_Prenom(),
                ":dateNaissance" => $adherent_object->get_dateNaissance(),
                ":Rue" => $adherent_object->get_Rue(),
                ":Cp" => $adherent_object->get_Cp(),
                ":Ville" => $adherent_object->get_Ville(),
                ":adresseMail" => $adherent_object->get_adresseMail(),
                ":id_demandeur" => $adherent_object->get_id_demandeur(),
                ":id_club" => $adherent_object->get_id_club(),
                ":id_representant" => $adherent_object->get_id_representant()
    ));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre d'insertion
}


} 

?>