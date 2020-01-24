<?php
include "includes/helpers/pdo.php";
include "includes/helpers/userData.php";
include "includes/models/ferias.model.php";
include "includes/models/user.model.php";
include "includes/models/message.model.php";
include "includes/helpers/adminPermissions.php";


if (isset($_POST['txtMessage']) && isset($_POST['txtTo'])) {
    $message = new Message();
    $message->setUserId($user_Id);
    $message->setDestinationId($_POST['txtTo']);
    $message->setText($_POST['txtMessage']);
    $message->sendMessage();
}

$ferias = new Ferias();
$user = new user();
$pending = $ferias->getByStatus('pending');
$nPending = sizeof($pending);
$totalDaysClaimed = $ferias->getTotalDaysClaimed();
$totalDaysUnclaimed = $ferias->getTotalDaysUnclaimed();
$totalUsers = $user->getTotalActiveUsers();
$totalPending = $user->getTotalPendingUsers();
