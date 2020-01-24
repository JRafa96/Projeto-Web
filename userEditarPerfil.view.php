<?php
include "includes/controllers/userEditarPerfil.controller.php";
include "includes/header.php";
if ($user_Permissions == 'admin') {

    include "includes/adminSidebar.php";
} else {

    include "includes/userSidebar.php";
}
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
                <div class="col-md-6">
                    <form method="POST">
                        <div class="card card-primary card-outline " style="height: 520.5px">

                            <div class="card-body box-profile">

                                <ul class="list-group list-group-unbordered mb-3 ">
                                    <li class="list-group-item ">
                                        <b>Nome:</b> <input type="text" name="txtNome" class="float-right text-center btn btn-default" value="<?= $user_Username ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email: </b> <input type="text" name="txtEmail" class="float-right text-center btn btn-default" value="<?= $user_Email ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <b>Password: </b> <input type="password" name="txtPassword" class="float-right text-center btn btn-default" value="<?= $user_Password ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <b>Telefone: </b> <input type="text" name="txtTelefone" class="float-right text-center btn btn-default" value="<?= $user_Phone ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <b>Morada: </b> <input type="text" name="txtMorada" class="float-right text-center btn btn-default" value="<?= $user_Address ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <b>Função: </b> <input type="text" name="txtFuncao" class="float-right text-center btn btn-default" value="<?= $user_JobTitle ?>">
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button class="btn btn-primary btn-block" name="guardar" type="submit"><b>Guardar Alterações</b></button>
                            </div>

                        </div>
                    </form>
                    <!-- /.card -->
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