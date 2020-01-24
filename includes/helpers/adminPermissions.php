<?php

if ($user_Permissions != 'admin') {
    header("location: userDashboard.view.php");
}
