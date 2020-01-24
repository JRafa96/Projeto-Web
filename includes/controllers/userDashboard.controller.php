<?php

include "includes/helpers/pdo.php";
include "includes/helpers/userData.php";
include "includes/models/ferias.model.php";
include "includes/models/user.model.php";
include "includes/models/message.model.php";

if ($user_Permissions == 'admin') {
    header("location: adminDashboard.view.php");
}

if (isset($_POST['txtMessage']) && isset($_POST['txtTo'])) {
    $message = new Message();
    $message->setUserId($user_Id);
    $message->setDestinationId($_POST['txtTo']);
    $message->setText($_POST['txtMessage']);
    $message->sendMessage();
}
