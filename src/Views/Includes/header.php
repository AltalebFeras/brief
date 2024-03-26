<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de réservation Music Vercors Festival</title>
  <link rel="stylesheet" href="/assets/style/style.css">
  <!-- le css à verifier pour le repartir -->
  <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/main.css">
  <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/form.css">
  <?php if (isset($_SESSION['connecté'])) { ?>
    <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/dashboard.css">
    <script src="<?= HOME_URL ?>assets/js/dashboard.js" defer></script>
  <?php } ?>
  <script src="<?= HOME_URL ?>assets/scripts/script.js" defer></script>
</head>

<body>

  <div id="header">
    <div class="logo">LOGO.</div>
    <div>
      <?php if (isset($_SESSION['connecté'])) { ?>
        <a href="deconnexion">Déconnexion</a>
      <?php } else { ?>
        <a href="connexion">Connexion</a>
        <a href="admin">Connexion</a>
      <?php } ?>
    </div>
  </div>


  <!--     <header>
        <button id=loginAdmin><a href="/login-admin.php">
            <img src="assets/logoadmin.png" alt="Logo Admin" id="logoAdmin"> Admin
        </a></button>
    </header> -->