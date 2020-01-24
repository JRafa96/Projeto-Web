<?php
session_start();


if (!(isset($_SESSION['logado']))) {
    echo '<script type="text/javascript">alert("Faça login para aceder a esta página");location="login.view.php";</script>';
} else {
    $user_Id = $_SESSION['userData']['id'];
    $user_Username = $_SESSION['userData']['username'];
    $user_Email = $_SESSION['userData']['email'];
    $user_Password = $_SESSION['userData']['password'];
    $user_Phone = $_SESSION['userData']['phone'];
    $user_Address = $_SESSION['userData']['address'];
    $user_JobTitle = $_SESSION['userData']['jobTitle'];
    $user_Permissions = $_SESSION['userData']['permissions'];
    $user_hDaysRemaining = $_SESSION['userData']['hDaysRemaining'];
}
