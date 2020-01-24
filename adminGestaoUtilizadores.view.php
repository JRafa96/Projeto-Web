<?php
include "includes/controllers/adminGerirUtilizadores.controller.php";
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
                    <h1 class="m-0 text-dark">Gestão de utilizadores</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Função</th>
                                    <th>Email</th>
                                    <th>Permissões</th>
                                    <th>Dias acumulados</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                foreach ($users as $user) {

                                    if ($user['status'] == 'pending') {
                                        $estado = 'Pendente';
                                    } else if ($user['status'] == 'refused') {
                                        $estado = 'Recusado';
                                    } else {
                                        $estado = 'Ativo';
                                    }

                                    echo '<tr>
                                    <td>' . $user['username'] . '</td>
                                    <td>' . $user['jobTitle'] . '</td>
                                    <td>' . $user['email'] . '</td>
                                    <td>' . $user['permissions'] . '</td>
                                    <td>' . $user['hDaysRemaining'] . '</td>
                                    <td>' . $estado . '</td>
                                    <td><a href="adminEditarPerfil.view.php?id=' . $user['id'] . '" class="btn btn-block btn-primary">Editar</a></td>
                                </tr>';
                                }


                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Função</th>
                                    <th>Email</th>
                                    <th>Permissões</th>
                                    <th>Dias acumulados</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "includes/footer.php";
include "includes/scripts.php" ?>

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese.json"
            },

        });
    });
</script>

</body>

</html>