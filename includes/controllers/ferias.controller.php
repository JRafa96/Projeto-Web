<?php
include "includes/helpers/pdo.php";
include "includes/helpers/userData.php";
include "includes/models/ferias.model.php";
include "includes/models/user.model.php";
include "includes/models/message.model.php";



if (isset($_POST['reservation'])) {

    $daterage = explode(" - ", $_POST['reservation']);
    $from = $daterage[0];
    $to = $daterage[1];

    $ferias = new Ferias();
    $ferias->setUserId($user_Id);
    $ferias->setFrom($from);
    $ferias->setTo($to);
    $ferias->submit();

    echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Fechar &times;</button>
                  <h5><i class="icon fas fa-check"></i> Registo de férias submetido com sucesso.</h5>
                </div>';
    #echo '<script type="text/javascript">alert("Registo de férias submetido com sucesso!");location="userDashboard.view.php";</script>';
}
