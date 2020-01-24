<?php
include "includes/helpers/pdo.php";
include "includes/helpers/userData.php";
include "includes/models/ferias.model.php";
include "includes/models/user.model.php";
include "includes/models/message.model.php";
include "includes/helpers/adminPermissions.php";

if (isset($_GET['aproveId'])) {
    $tempF = new Ferias();
    $id = $_GET['aproveId'];

    $entry = $tempF->getById($id);
    $userId = $entry['userId'];
    $from = $entry['from'];
    $to = $entry['to'];

    $temp = new Ferias();
    $days = $temp->number_of_working_days($userId, $from, $to);
    $tempUser = new user();
    $entryUser = $tempUser->findUserById($userId);

    if ($days > $entryUser['hDaysRemaining']) {
        echo '<div class="alert alert-danger" role="alert">O pedido não pode ser aceite. <br> Número de dias requisitados superior aos dias disponíveis do utilizador</div>';
    } else {
        $tempF->aproveEntry($id);
        $tempUser->updateDays($userId, $days);
    }
}

if (isset($_GET['refuseId'])) {
    $tempF = new Ferias();
    $id = $_GET['refuseId'];
    $tempF->refuseEntry($id);
}

$ferias = new Ferias();
$pending = $ferias->getByStatus('pending');
$user = new user();
