<?php

namespace src\Repositories;

use src\Models\Utilisateur;
use PDO;
use src\Models\Database;

class UtilisateurRepositories
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  public function getThisUtilisateurById($id): Utilisateur
  {
    $sql = $this->concatenationRequete("WHERE " . PREFIXE . "utilisateur.ID = :id");

    $statement = $this->DB->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, Utilisateur::class);
    return $statement->fetch();
  }

  /**
   * Un autre exemple d'une requête préparée, avec prepare et execute :
   * Cette fois-ci on donne les paramètres tout de suite lors du execute, sous forme d'un tableau associatif.
   */
  public function getThoseFilmsByClassificationAge($Id_Classification): array
  {
    $sql = $this->concatenationRequete("WHERE " . PREFIXE . "films.ID_CLASSIFICATION_AGE_PUBLIC = :Id_Classification");

    $statement = $this->DB->prepare($sql);

    $statement->execute([':Id_Classification' => $Id_Classification]);

    return $statement->fetchAll(PDO::FETCH_CLASS, Film::class);
  }


  // Construire la méthode getThoseFilmsByName() Et oui, parce qu'on peut avoir plusieurs films avec le même nom !
  public function getThoseUtilisateurByName($NOM): array
  {
    $sql = $this->concatenationRequete("WHERE " . PREFIXE . "Utilisateur.NOM LIKE :NOM");

    $statement = $this->DB->prepare($sql);

    $statement->execute([':NOM' => "%" . $NOM . "%"]);

    return $statement->fetchAll(PDO::FETCH_CLASS, Utilisateur::class);
  }

  /**
   * Permet de créer un nouveau film. Retourne l'objet film avec son Id fraîchement créé par la BDD.
   *
   * @param Film $film
   * @return Film
   */
  public function CreateThisUtilisateur(Utilisateur $Utilisateur): Utilisateur
  {
    $sql = "INSERT INTO " . PREFIXE . "Utilisateur (NOM, PRENOM, TELEPHONE, ADRESSE, MOTDEPASSE, ROLE, RGPD, EMAIL) VALUES (:nom, :prenom, :telephone, :adresse, :motdepasse, :role, :rgpd, :email);";
    $statement = $this->DB->prepare($sql);

    $statement->execute([
      ':nom'=> $Utilisateur->getNom(),
      ':PRENOM'=> $Utilisateur->getPrenom(),
      ':TELEPHONE'=> $Utilisateur->getTelephone(),
      ':ADRESSE'=> $Utilisateur->getAdresse(),
      ':MOTDEPASSE'=> $Utilisateur->getMotDePasse(),
      ':ROLE'=> $Utilisateur->getRole(),
      ':RGPD'=> $Utilisateur->getRgpd()
    ]);

    $id = $this->DB->lastInsertId();
    $Utilisateur->setId($id);

    return $Utilisateur;
  }

  public function deleteThisUtilisateur($Id): bool
  {
    

  //   a creer delete user;
  }
}
