<?php
include "includes/helpers/pdo.php";
include "includes/helpers/userData.php";
include "includes/models/feriado.model.php";
include "includes/models/user.model.php";
include "includes/models/message.model.php";
include "includes/helpers/adminPermissions.php";


$tempF = new Feriado();
$feriados = $tempF->getHolidays();
$erroNome = false;

if (isset($_POST['btnFeriado'])) {

    if (!empty($_POST['txtName'])) {
        $name = $_POST['txtName'];
        $day = $_POST['sDay'];
        $month = $_POST['sMonth'];
        $year = $_POST['sYear'];
        $f = $day . "/" . $month . "/" . $year;
        $tempF->addHoliday($name, $f);
        header("Refresh:0");
    } else {
        $erroNome = true;
    }
}

if (isset($_GET['deleteId'])) {
    $fId = $_GET['deleteId'];
    $tempF->deleteHolidayById($fId);
    header("Location: adminGestaoFeriados.view.php");
}
