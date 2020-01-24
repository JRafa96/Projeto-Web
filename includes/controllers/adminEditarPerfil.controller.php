<?php
include "includes/helpers/pdo.php";
include "includes/helpers/userData.php";
include "includes/models/ferias.model.php";
include "includes/models/user.model.php";
include "includes/models/message.model.php";
include "includes/helpers/adminPermissions.php";

$tempU = new user();
$user = $tempU->findUserById($_GET['id']);

if (isset($_POST['guardar'])) {
    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $password = $_POST['txtPassword'];
    $telefone = $_POST['txtTelefone'];
    $morada = $_POST['txtMorada'];
    $funcao = $_POST['txtFuncao'];
    $estado = $_POST['estado'];
    $days = $_POST['nFerias'];
    $permissions = $_POST['permissoes'];


    $workingDays = array();
    if (isset($_POST['segunda'])) {
        array_push($workingDays, '1');
    }
    if (isset($_POST['terça'])) {
        array_push($workingDays, '2');
    }
    if (isset($_POST['quarta'])) {
        array_push($workingDays, '3');
    }
    if (isset($_POST['quinta'])) {
        array_push($workingDays, '4');
    }
    if (isset($_POST['sexta'])) {
        array_push($workingDays, '5');
    }
    if (isset($_POST['sabado'])) {
        array_push($workingDays, '6');
    }
    if (isset($_POST['domingo'])) {
        array_push($workingDays, '7');
    }
    $workingDays = implode(",", $workingDays);



    $tempU->updateUserProfile($_GET['id'], $nome, $email, $password, $telefone, $morada, $funcao);
    $tempU->changeStatus($_GET['id'], $estado);
    $tempU->changeDays($_GET['id'], $days);
    $tempU->changePermissions($_GET['id'], $permissions);
    $tempU->changeWorkingDays($_GET['id'], $workingDays);

    header("Location: adminGestaoUtilizadores.view.php");
}
