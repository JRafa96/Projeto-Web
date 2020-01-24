<?php
include "includes/helpers/pdo.php";
include "includes/helpers/userData.php";
include "includes/models/ferias.model.php";
include "includes/models/user.model.php";
include "includes/models/message.model.php";
include "includes/helpers/adminPermissions.php";

$tempF = new Ferias();
$tempUser = new user();
$eventos = $tempF->getByStatus('aproved');
