<?php
error_reporting(E_ALL);

include_once '../connect.php';

$pdo = pdo();

class DAO_Club
{

/* 

* Fonction find de club

*/
    public function find_club($id_club) {

      $sql = "SELECT * FROM club WHERE id_club =:id_club";

        try {
            $sth = $con->prepare($sql);
            $sth->execute(array(":id_club" => $id_club));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            die( "<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }

        $club_object = new Club($row);

         return $club_object;

    }

/* 

* Fonction findall de club

*/
    public function findall_club() {

          $sql = "SELECT * FROM club";

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
              $array[] = new DAO_Club($row);
            }
            return $array;


    }
/* 

* Fonction update de club

*/
    function update_club(Club $id_club) {

      $sql = "UPDATE club SET id_club =:id_club, nom_club =:nom_club, adresse_club =:adresse_club, cp_club =:cp_club, ville_club =:ville_club, sigle_club =:sigle_club, nompresident_club =:nompresident_club, id_ligue =:id_ligue";

      try {
        $sth = $con->prepare($sql);
        $sth->execute(
                array(

                    ":id_club" => $club_object->get_id_club(),
                    ":nom_club" => $club_object->get_nom_club(),
                    ":adresse_club" => $club_object->get_adresse_club(),
                    ":cp_club" => $club_object->get_cp_club(),
                    ":ville_club" => $club_object->get_ville_club(),
                    ":sigle_club" => $club_object->get_sigle_club(),
                    ":nompresident_club" => $club_object->get_nompresident_club(),
                    ":id_ligue" => $club_object->get_id_ligue()

        ));
        
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }
      $nb = $sth->rowcount();
      return $nb;  // Retourne le nombre de mise à jour
}
/* 

* Fonction delete de club

*/
function delete_club($id_club) {
  $sql = "DELETE FROM club WHERE id_club =:id_club";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(array(":id_club" => $id_club));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre de suppression
}

/* 

* Fonction insert de club

*/function insert_club(Club $club_object) {

  $sql = "INSERT INTO club(id_club, nom_club, adresse_club, cp_club, ville_club, sigle_club, nompresident_club, id_ligue) VALUES (:id_club, :nom_club, :adresse_club, :cp_club, :ville_club, :sigle_club, :nompresident_club, :id_ligue )";
  try {
    $sth = $con->prepare($sql);
    $sth->execute(
            array(
                ":id_club" => $club_object->get_id_club(),
                ":nom_club" => $club_object->get_nom_club(),
                ":adresse_club" => $club_object->get_adresse_club(),
                ":cp_club" => $club_object->get_cp_club(),
                ":ville_club" => $club_object->get_ville_club(),
                ":sigle_club" => $club_object->get_sigle_club(),
                ":nompresident_club" => $club_object->get_nompresident_club(),
                ":id_ligue" => $club_object->get_id_ligue()
    ));
  } catch (PDOException $e) {
    throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
  }
  $nb = $sth->rowcount();
  return $nb;  // Retourne le nombre d'insertion
}

} 

?>