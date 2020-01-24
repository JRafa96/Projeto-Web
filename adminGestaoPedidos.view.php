<?php
include "includes/controllers/adminGerirFerias.controller.php";
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
                    <h1 class="m-0 text-dark">Gestão de pedidos</h1>
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
                                    <th>Dias acumulados</th>
                                    <th>Dias a requisitar</th>
                                    <th>De</th>
                                    <th>Até</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($pending as $index => $item) {
                                    $tempUser = $user->findUserById($item['userId']);
                                    $tempDays = $ferias->number_of_working_days($item['userId'], $item['from'], $item['to']);
                                    echo "<tr><td>" . $tempUser['username'] . "</td><td> " . $tempUser['jobTitle'] . "</td><td> " . $tempUser['hDaysRemaining'] . "</td><td> " . $tempDays . "</td><td> " . $item['from'] . "</td><td> " . $item['to'] . "</td><td> <a href='?aproveId=" . $item['id'] . "' class='btn btn-block btn-outline-success'>Aprovar</a></td><td> <a href='?refuseId=" . $item['id'] . "' class='btn btn-block btn-outline-danger'>Recusar</a></td></tr>";
                                } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Função</th>
                                    <th>Dias acumulados</th>
                                    <th>Dias a requisitar</th>
                                    <th>De</th>
                                    <th>Até</th>
                                    <th></th>
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
<script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese.json"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.20/sorting/date-euro.js"></script>
<!-- page script -->
<script>
    $(function() {
        $('#example1').DataTable();

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
                targets: [3, 4]
            }]

        });
    });
</script>

</body>

</html>