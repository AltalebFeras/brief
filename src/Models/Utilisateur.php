<?php

namespace src\Models;

use src\Services\Hydratation;

class Utilisateur {
    private $Id, $Nom, $Prenom, $Telephone, $Adresse, $Email, $MotDePasse, $RGPD, $Role;

    use Hydratation;


    public function getId(): int {
        return $this->Id;
    }
    public function setId(int $Id) {
        $this->Id = $Id;
    }

    public function getPrenom(): string {
        return $this->Prenom;
    }
    public function setPrenom(string $Prenom) {
        $this->Prenom = $Prenom;
    }

    public function getNom(): string {
        return $this->Nom;
    }
    public function setNom(string $Nom) {
        $this->Nom = $Nom;
    }

    public function getTelephone(): string {
        return $this->Telephone;
    }
    public function setTelephone(string $Telephone) {
        $this->Telephone = $Telephone;
    }

    public function getAdresse(): string {
        return $this->Adresse;
    }
    public function setAdresse(string $Adresse) {
        $this->Adresse = $Adresse;
    }

    public function getEmail(): string {
        return $this->Email;
    }
    public function setEmail(string $Email) {
        $this->Email = $Email;
    }

    public function getMotDePasse(): string {
        return $this->MotDePasse;
    }
    public function setMotDePasse(string $MotDePasse) {
        $this->MotDePasse = $MotDePasse;
    }

    public function getRGPD(): string {
        return $this->RGPD;
    }
    public function setRGPD(string $RGPD) {
        $this->RGPD = $RGPD;
    }

    public function getRole(): string {
        return $this->Role;
    }
    public function setRole(string $Role) {
        $this->Role = $Role;
    }
}
