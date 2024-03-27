<form id="formSignIn" method="post" class="
  d-flex flex-column bd-highlight mb-3 form-control" action="treatmentSignIn.php">
    <div id="message">
        <?php
        if (isset($_SESSION['error_message1'])) {
            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message1'] . '</div>';
            unset($_SESSION['error_message1']);
        }
        if (isset($_SESSION['success_message'])) {
            echo '<div class="alert bg-success" role="alert">' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']);
        }
        ?>
    </div>

    <label for="email">Email :*</label>

    <input id="email" type="email" name="email" class="mb-3 mx-2" minlength="3" maxlength="80" placeholder="Enter your email" required>

    <label for="password">password :*</label>
    <input id="password" type="password" name="password" class="mb-3 mx-2" minlength="7" placeholder="Enter your password" required>

    <input type="submit" name="submit" value="sign in" class="mb-3 mx-2">
</form>H