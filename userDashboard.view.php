<?php
include "includes/controllers/userDashboard.controller.php";
include "includes/header.php";
include "includes/userSidebar.php";
include "includes/navBar.php";

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= 30 - $user_hDaysRemaining ?></h3>
                            <p>Total dias marcados</p>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $user_hDaysRemaining ?></h3>

                            <p>Dias por marcar</p>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $tempF = new Ferias();
                            $userPending = $tempF->getByStatusAndUserId($user_Id, 'pending');
                            $userPending = sizeof($userPending);


                            echo "<h3>$userPending</h3>" ?>
                            <p>Pedidos pendentes</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <?php include "includes/messages.php"; ?>

                </div>
                <!-- /.col-md-6 -->
                <div class="col-md-6">
                    <?php include "includes/userProfile.php" ?>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "includes/footer.php";
include "includes/scripts.php" ?>

</body>

</html>