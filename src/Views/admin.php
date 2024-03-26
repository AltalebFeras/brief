<div class="main">
    <h1>Administration</h1>
    <form action="connexion" method="post">
        <label for="password">Code d'accès :</label>
        <input type="password" id="password" name="password" required>
        <?php if ($erreur == "connexion") { ?>
            <div class="error">
                Erreur de connexion.
            </div>
        <?php } ?>
        <input type="submit" value="Se connecter">
    </form>
</div>

<!--     <header>
        <button id=loginAdmin><a href="/login-admin.php">
            <img src="assets/logoadmin.png" alt="Logo Admin" id="logoAdmin"> Admin
        </a></button>
    </header> -->