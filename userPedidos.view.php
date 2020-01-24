<?php
include "includes/controllers/userPedidos.controller.php";
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
                                    <th>#</th>
                                    <th>De</th>
                                    <th>Até</th>
                                    <th>Dias a requisitar</th>
                                    <th>Estado do pedido</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                foreach ($pedidos as $index => $pedido) {
                                    if ($pedido['status'] == 'pending') {
                                        $estado = 'Pendente';
                                    } else if ($pedido['status'] == 'refused') {
                                        $estado = 'Recusado';
                                    } else {
                                        $estado = 'Aprovado';
                                    }
                                    echo    '<tr>
                                                <td>' . ($index + 1) . '</td>
                                                <td>' . $pedido['from'] . '</td>
                                                <td>' . $pedido['to'] . '</td>
                                                <td>' . $pedido['days'] . '</td>
                                                <td>' . $estado . '</td>
                                            </tr>';
                                } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>De</th>
                                    <th>Até</th>
                                    <th>Dias a requisitar</th>
                                    <th>Estado do pedido</th>
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