<?php

if (isset($_POST['Registar'])) {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $jobTitle = $_POST['jobTitle'];

        $user = new user();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setJobTitle($jobTitle);
        $user->register();

        header("location: login.view.php");
    }
}
