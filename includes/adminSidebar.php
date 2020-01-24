<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
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
                    <a href="adminDashboard.view.php" class="nav-link active">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="adminCalendario.view.php" class="nav-link">
                        <i class=" fa fa-calendar nav-icon"></i>
                        Calendário Geral
                    </a>
                </li>

                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Gestão
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="adminGestaoUtilizadores.view.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gerir utilizadores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adminGestaoPedidos.view.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gerir pedidos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adminGestaoFeriados.view.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gerir feriados</p>
                            </a>
                        </li>
                    </ul>
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