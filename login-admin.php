
    <div id="sectionAdmin">
        <h1>Login Admin <img src="assets/logoadmin.png" id="logoAdm"></h1>
        <h3>Rentrez votre mot de passe</h3>
        <form action="admin.php" method="POST">
            <input type="password" placeholder="Mot de passe" name="password">
            <button>Se connecter</button>
            <br>
            <?php
            if (isset($_GET['error'])) {
                echo "<label>" . $_GET['error'] . "</label>";
            }
            ?>
        </form>
    </div>