<?php
include "includes/controllers/ferias.controller.php";
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
                    <h1 class="m-0 text-dark">Requisitar férias</h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Pedido de férias</h3>
                        </div>
                        <div class="card-body">

                            <h3 class="profile-username text-center" style="margin-bottom: 15px">Tem <?= $user_hDaysRemaining ?> dias disponíveis</h3>
                            <!-- Date range -->
                            <form class="form-group" method="POST">
                                <label>De - Até</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" name="reservation" id="reservation">
                                </div>
                                <div style="margin-top: 30px">
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="fa fa-book"></i> Submeter pedido</button>
                            </form>

                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                    <!-- /.card-body -->
                </div>
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
<!-- InputMask -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="/plugins/daterangepicker/daterangepicker.js"></script>


<script>
    $(function() {
        //Date range picker
        $('#reservation').daterangepicker({
            separator: ' até ',
            locale: {
                format: 'DD/MM/YYYY'
            }
        })
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            separator: ' até ',
            locale: {
                format: 'DD/MM/YYYY hh:mm A'
            }
        })

    })
</script>

</body>

</html>