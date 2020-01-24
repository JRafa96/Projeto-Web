<?php
include "includes/helpers/pdo.php";
include "includes/models/user.model.php";
include "includes/controllers/login.controller.php";
include "includes/header.php";

?>


<div class="login-dark" id="loginDiv">
    <form method="post" id="form-login">
        <h2 class="sr-only">Login</h2>
        <div style="margin-bottom:30px"><img class="img-thumbnail rounded-circle" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn1.iconfinder.com%2Fdata%2Ficons%2Favatar-3%2F512%2FManager-512.png&f=1&nofb=1"></div>
        <div class="form-group"><input class="form-control" type="text" name="email" placeholder="Email"></div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>

        <?php if ($erroLogin) {
            echo '<div class="alert alert-danger" role="alert">Login inválido</div>';
        } ?>
        <?php if ($notAproved) {
            echo '<div class="alert alert-warning" role="alert">Utilazor à espera de aprovação. Contacte um administrador</div>';
        } ?>
        <div class="form-group"><button class="btn btn-primary btn-block" name="Login" type="submit">Login</button></div><a class="forgot" href="registo.view.php">Não tem conta? Registe-se aqui!</a>
    </form>
</div>


<?php
include "includes/footer.php";
include "includes/scripts.php"; ?>

</body>

</html>