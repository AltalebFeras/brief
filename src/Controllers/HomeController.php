<?php

namespace src\Controllers;

use src\Services\Reponse;

class HomeController
{

  use Reponse;

  public function index(): void
  {
    if (isset($_GET['erreur'])) {
      $erreur = htmlspecialchars($_GET['erreur']);
    } else {
      $erreur = '';
    }

    $this->render("Accueil", ["erreur" => $erreur]);
  }
  public function newReservation(): void
  {
    if (isset($_GET['erreur'])) {
      $erreur = htmlspecialchars($_GET['erreur']);
    } else {
      $erreur = '';
    }

    $this->render("newReservation", ["erreur" => $erreur]);
  }
  

  public function indexAdmin(): void
  {
    $erreur = isset($_GET['erreur']) ? htmlspecialchars($_GET['erreur']) : '';

    $this->render("admin", ["erreur" => $erreur]);
  }
  public function indexConnexion(): void
{
    $erreur = isset($_GET['erreur']) ? htmlspecialchars($_GET['erreur']) : '';

    $this->render("connexion", ["erreur" => $erreur]);
}

  public function authAdmin(string $password): void
  {
    if ($password === 'admin') {
      $_SESSION['connecté'] = TRUE;
      header('location: ' . HOME_URL . 'dashboard');
      die();
    } else {
      header('location: ' . HOME_URL . '?erreur=connexion');
    }
  }

  public function authUser(string $password): void
  {
    if ($password === 'admin') {
      $_SESSION['connecté'] = TRUE;
      header('location: ' . HOME_URL . 'dashboard');
      die();
    } else {
      header('location: ' . HOME_URL . '?erreur=connexion');
    }
  }

  public function quit()
  {
    session_destroy();
    header('location: ' . HOME_URL);
    die();
  }

  public function page404(): void
  {
    header("HTTP/1.1 404 Not Found");
    $this->render('404');
  }
}
