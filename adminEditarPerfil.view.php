<?php
include "includes/controllers/adminEditarPerfil.controller.php";
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
                    <h1 class="m-0 text-dark">Edição de perfil</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <form method="POST">
            <div class="container-fluid">
                <div class="row" style="height: 600px">
                    <div class="col-md-6">

                        <div class="card card-primary card-outline " style="height: 600px">

                            <div class="card-body box-profile">

                                <ul class="list-group list-group-unbordered mb-3 ">
                                    <li class="list-group-item ">
                                        <b>Nome:</b> <input type="text" name="txtNome" class="float-right text-center btn btn-default" value="<?= $user['username'] ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email: </b> <input type="text" name="txtEmail" class="float-right text-center btn btn-default" value="<?= $user['email'] ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <b>Password: </b> <input type="password" name="txtPassword" class="float-right text-center btn btn-default" value="<?= $user['password'] ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <b>Telefone: </b> <input type="text" name="txtTelefone" class="float-right text-center btn btn-default" value="<?= $user['phone'] ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <b>Morada: </b> <input type="text" name="txtMorada" class="float-right text-center btn btn-default" value="<?= $user['address'] ?>">
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="card card-primary card-outline ">

                            <div class="card-body box-profile">

                                <ul class="list-group list-group-unbordered mb-3 ">
                                    <li class="list-group-item">
                                        <b>Função: </b> <input type="text" name="txtFuncao" class="float-right text-center btn btn-default" value="<?= $user['jobTitle'] ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <b>Dias de férias restantes: </b> <input type="number" name="nFerias" class="float-right text-center btn btn-default" value="<?= $user['hDaysRemaining'] ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <label for="estado">Estado da conta</label>
                                        <select class="form-control" id="estado" name="estado">
                                            <option <?= $user['status'] == "aproved" ? "selected" : ""; ?> value="aproved">Ativo</option>
                                            <option <?= $user['status'] == "pending" ? "selected" : ""; ?> value="pending">Pendente</option>
                                            <option <?= $user['status'] == "refused" ? "selected" : ""; ?> value="refused">Recusado</option>
                                        </select>
                                    </li>
                                    <li class="list-group-item">
                                        <label for="permissoes">Permissões</label>
                                        <select class="form-control" id="permissoes" name="permissoes">
                                            <option <?= $user['permissions'] == "admin" ? "selected" : ""; ?> value="admin">Administrador</option>
                                            <option <?= $user['permissions'] == "normal" ? "selected" : ""; ?> value="normal">Normal</option>
                                        </select>
                                    </li>

                                    <?php $wd = explode(",", $user['workingDays']) ?>
                                    <li class="list-group-item" id="work">
                                        <label for="work">Dias de trabalho</label>
                                        <div class="form-check" id="workingDays">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="segunda" value="1" <?= in_array('1', $wd) ? "checked" : ""; ?>>Segunda</input>
                                            </label>
                                        </div>
                                        <div class="form-check" id="workingDays">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="terça" value="2" <?= in_array('2', $wd) ? "checked" : ""; ?>>Terça</input>
                                            </label>
                                        </div>
                                        <div class="form-check" id="workingDays">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="quarta" value="3" <?= in_array('3', $wd) ? "checked" : ""; ?>>Quarta</input>
                                            </label>
                                        </div>
                                        <div class="form-check" id="workingDays">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="quinta" value="4" <?= in_array('4', $wd) ? "checked" : ""; ?>>Quinta</input>
                                            </label>
                                        </div>
                                        <div class="form-check" id="workingDays">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sexta" value="5" <?= in_array('5', $wd) ? "checked" : ""; ?>>Sexta</input>
                                            </label>
                                        </div>
                                        <div class="form-check" id="workingDays">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sabado" value="6" <?= in_array('6', $wd) ? "checked" : ""; ?>>Sábado</input>
                                            </label>
                                        </div>
                                        <div class="form-check-inline" id="workingDays">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="domingo" value="7" <?= in_array('7', $wd) ? "checked" : ""; ?>>Domingo</input>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-footer">
                            <button class="btn btn-primary btn-block" name="guardar" type="submit"><b>Guardar Alterações</b></button>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
        </form>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "includes/footer.php";
include "includes/scripts.php" ?>

</body>

</html>