<?php
include "includes/controllers/adminDashboard.controller.php";
include "includes/header.php";
include "includes/adminSidebar.php";
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
              <h3><?= $totalDaysClaimed ?></h3>
              <p>Total dias marcados</p>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $totalDaysUnclaimed ?></h3>

              <p>Dias por marcar</p>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $totalUsers ?></h3>

              <p>Funcionários Ativos</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">


          <?php include "includes/messages.php"; ?>


        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h5 class="m-0">Gestão de Férias</h5>
            </div>
            <div class="card-body">
              <p class="card-text">Tem <?= $nPending ?> pedidos de férias à espera de aprovação</p>
              <a href="adminGestaoPedidos.view.php" class="btn btn-primary">Ir para gestão de pedidos</a>
            </div>
          </div>

          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Utilizadores</h5>
            </div>
            <div class="card-body">
              <p class="card-text">Há <?= $totalPending ?> utilizadores à espera de aprovação</p>
              <a href="adminGestaoUtilizadores.view.php" class="btn btn-primary">Ir para gestão de utilizadores</a>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
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