<?php

namespace src\Models;

use src\Services\Hydratation;

class Utilisateur {
    private $Id, $nom, $prenom, $telephone, $adresse, $email, $motDePasse, $RGPD, $role;

    use Hydratation;

    public function __set($nom, $value) {
        if (property_exists($this, $nom)) {
            $this->$nom = $value;
        }
    }

    public function getId(): int {
        return $this->Id;
    }
    public function setId(int $Id) {
        $this->Id = $Id;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }
    public function setPrenom(string $prenom) {
        $this->prenom = $prenom;
    }

    public function getNom(): string {
        return $this->nom;
    }
    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function getTelephone(): string {
        return $this->telephone;
    }
    public function setTelephone(string $telephone) {
        $this->telephone = $telephone;
    }

    public function getAdresse(): string {
        return $this->adresse;
    }
    public function setAdresse(string $adresse) {
        $this->adresse = $adresse;
    }

    public function getEmail(): string {
        return $this->email;
    }
    public function setEmail(string $email) {
        $this->Eeail = $email;
    }

    public function getMotDePasse(): string {
        return $this->motDePasse;
    }
    public function setMotDePasse(string $motDePasse) {
        $this->motDePasse = $motDePasse;
    }

    public function getRGPD(): string {
        return $this->RGPD;
    }
    public function setRGPD(string $RGPD) {
        $this->RGPD = $RGPD;
    }

    public function getRole(): string {
        return $this->role;
    }
    public function setRole(string $role) {
        $this->role = $role;
    }
}
