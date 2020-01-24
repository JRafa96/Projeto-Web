<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/jrafa_Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Projeto Web</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/users/defaultUserImg.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="userEditarPerfil.view.php" class="d-block"><?= $user_Username ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="userDashboard.view.php" class="nav-link active">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="userFeriasReq.view.php" class="nav-link">
                        <i class="fa fa-hotel nav-icon"></i>
                        <p>Requisitar férias</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="userPedidos.view.php" class="nav-link">
                        <i class="fa fa-book nav-icon"></i>
                        <p>Os meus pedidos</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a type="button" href="includes/controllers/logout.controller.php" class="text-white nav-link btn btn-block  btn-info">Logout</a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>