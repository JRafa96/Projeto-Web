<?php

include "includes/helpers/adminPermissions.php";

if (isset($_GET['showId'])) {
    $tempM = new Message();
    $id = $_GET['showId'];

    $tempM->showMessage($id);
}

if (isset($_GET['hideId'])) {
    $tempM = new Message();
    $id = $_GET['hideId'];
    $tempM->hideMessage($id);
}

if (isset($_GET['showAll'])) {
    $tempM = new Message();
    $tempM->showAll();
}

if (isset($_GET['hideAll'])) {
    $tempM = new Message();
    $tempM->hideAll();
}
