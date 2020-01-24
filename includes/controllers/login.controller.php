<?php
session_start();
$erroLogin = false;
$notAproved = false;
if (isset($_POST['Login'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new user();
        $user->setEmail($email);
        $user->setPassword($password);
        $autenticado = $user->authenticate();


        if ($autenticado == true) {
            $userData = $user->getUser();
            if ($userData['status'] == 'aproved') {
                $_SESSION['userData'] = $userData;
                $_SESSION['logado'] = true;
            } else {
                $_SESSION['logado'] = false;
                $notAproved = true;
            }
        } else {
            $_SESSION['logado'] = false;

            $erroLogin = true;
        }
    }
}

if (isset($_SESSION['logado'])) {

    if ($_SESSION['logado'] == true) {
        if ($_SESSION['userData']['permissions'] == 'admin') {
            header("location: adminDashboard.view.php");
        } else {
            header("location: userDashboard.view.php");
        }
    }
}
