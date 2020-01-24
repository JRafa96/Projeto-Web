<?php
include "includes/controllers/adminGerirFeriados.controller.php";
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
                    <h1 class="m-0 text-dark">Gestão de feriados</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <form method="POST" name="feriado">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="fName">Nome:</label>
                        <input type="text" class="form-control" name="txtName" id="fName">
                    </div>
                    <?php

                    if ($erroNome) {
                        echo '<div class="alert alert-danger" role="alert">Introduza um nome para o feriado</div>';
                    }

                    ?>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="sDay">Dia:</label>
                        <select class="form-control" id="sDay" name="sDay">
                            <?php for ($i = 1; $i <= 31; $i++) {
                                echo "<option value='$i'>$i</option>";
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="sMonth">Mês:</label>
                        <select class="form-control" id="sMonth" name="sMonth">
                            <?php for ($i = 1; $i <= 12; $i++) {
                                echo "<option value='$i'>$i</option>";
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">

                        <label for="sYear">Ano:</label>
                        <select class="form-control" id="sYear" name="sYear">
                            <option value="*">Anualmente</option>
                            <?php for ($i = 2020; $i <= 2030; $i++) {
                                echo "<option>$i</option>";
                            } ?>
                        </select>

                    </div>

                </div>

                <div class="col-2">
                    <button type="submit" name="btnFeriado" class="btn btn-block btn-success" style="margin-top: 31px">Adicionar</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Dia</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php


                                foreach ($feriados as $feriado) {
                                    echo '<tr>
                                    <td>' . $feriado['name'] . '</td>
                                    <td>' . $feriado['day'] . '</td>
                                    <td><a href="?deleteId=' . $feriado['id'] . '" class="btn btn-block btn-danger">Remover</a></td>
                                    </tr>';
                                }


                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Dia</th>
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
            columnDefs: [{
                type: 'date-euro',
                targets: [1]
            }]

        });
    });
</script>

</body>

</html>