<?php

include_once __DIR__ . '/Includes/header.php';
?>

<form action="">
  <fieldset id="SignUp">
    <legend>SignUp</legend>
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required autocomplete="family-name">
    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" required autocomplete="given-name">
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required autocomplete="email">
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required autocomplete="tel">
    <label for="passwordConfirm">Verifier le mot de passe :</label>
    <input type="password" name="passwordConfirm" id="passwordConfirm" required autocomplete="address-line1">

    <input type="submit" name="signUp" class="bouton" id="signUp" value="Sign up">
  </fieldset>
</form>

<?php
include_once __DIR__ . '/Includes/footer.php';
