<?php
include "includes/helpers/pdo.php";
include "includes/models/user.model.php";
include "includes/controllers/registo.controller.php";
include "includes/header.php";

?>


<div class="login-dark" id="registerDiv">
    <form method="post" id="form-registo">
        <h2 class="sr-only">Registo</h2>
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
        <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Nome"></div>
        <div class="form-group"><input class="form-control" type="text" name="jobTitle" placeholder="Função"></div>
        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
        <div class="form-group"><button class="btn btn-primary btn-block" name="Registar" type="submit">Registar</button></div><a class="forgot" href="login.view.php">Já tem uma conta? Faça login!</a>
    </form>
</div>



<?php
include "includes/footer.php";
include "includes/scripts.php"; ?>
</body>

</html>