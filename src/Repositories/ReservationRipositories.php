<?php
namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Reservation;
use src\Models\Database;

class ReservationRipository {
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  public function getAllReservation(){
    $sql = "SELECT * FROM ".PREFIXE."Reservation;";

    $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, Reservation::class);

    return $retour;
  }

  public function getThisReservationById(int $id): Reservation|bool {
    $sql = "SELECT * FROM ".PREFIXE."Reservation WHERE id = :id";

    $statement = $this->DB->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, Reservation::class);
    $retour = $statement->fetch();

    return $retour;
  }

  public function getThoseReservationByeReservationID(string $nom): array {
    $sql = "SELECT * FROM ". PREFIXE ."Reservation WHERE NOM = :nom";

    $statement = $this->DB->prepare($sql);

    $statement->bindParam(':nom', $nom);

    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS, Reservation::class);
  }

  public function CreateThisReservation(Reservation $Reservation): bool{
    $sql = "INSERT INTO ". PREFIXE . "Reservation (ID, DESCRIPTION, NOM) VALUES (:ID, :DESCRIPTION, :NOM)";

    $statement = $this->DB->prepare($sql);

    $retour = $statement->execute([
      ':ID' => $Reservation->getReservationID(),
      ':DESCRIPTION' => $Reservation->getDescription(),
      ':NOM' => $Reservation->getNom()
    ]);

    return $retour;
  }

  public function UpdateThisReservation(Reservation $Reservation): bool{
    $sql = "UPDATE ". PREFIXE . "Reservation 
            SET
              DESCRIPTION =:DESCRIPTION,
              NOM = :NOM
            WHERE ID = :ID";

    $statement = $this->DB->prepare($sql);

    $retour = $statement->execute([
      ':ID' => $Reservation->getId(),
      ':DESCRIPTION' => $Reservation->getDescription(),
      ':NOM' => $Reservation->getNom()
    ]);

    return $retour;
  }

    public function deleteThisReservation(int $ID): bool {
      try{
      $sql = "DELETE FROM " . PREFIXE . "relations_Reservation WHERE ID_CATEGORIES = :ID;
              DELETE FROM " . PREFIXE . "categories WHERE ID = :ID;";
  
      $statement = $this->DB->prepare($sql);
  
      return $statement->execute([':ID' => $ID]);
  
      } catch(PDOException $error) {
        echo "Erreur de suppression : " . $error->getMessage();
        return FALSE;
      }
    }
}