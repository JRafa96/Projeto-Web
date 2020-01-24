<?php

include "includes/helpers/pdo.php";
include "includes/helpers/userData.php";
include "includes/models/ferias.model.php";
include "includes/models/user.model.php";
include "includes/models/message.model.php";

if (isset($_POST['guardar'])) {
    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $password = $_POST['txtPassword'];
    $telefone = $_POST['txtTelefone'];
    $morada = $_POST['txtMorada'];
    $funcao = $_POST['txtFuncao'];

    $tempUser = new user();
    $tempUser->updateUserProfile($user_Id, $nome, $email, $password, $telefone, $morada, $funcao);


    $tempUser->setEmail($email);
    $userData = $tempUser->getUser();
    unset($_SESSION['userData']);
    $_SESSION['userData'] = $userData;
    header("Refresh:0");
}
