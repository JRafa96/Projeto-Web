<!-- Profile Image -->
<div class="card card-primary card-outline " style="height: 520.5px">
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="../../dist/img/users/defaultUserImg.png" alt="User profile picture">
        </div>

        <h3 class="profile-username text-center" style="margin-bottom: 15px"><?= $user_Username ?></h3>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Função: </b> <a class="float-right"><?= $user_JobTitle ?></a>
            </li>
            <li class="list-group-item">
                <b>Email: </b> <a class="float-right"><?= $user_Email ?></a>
            </li>
            <li class="list-group-item">
                <b>Permissões</b> <a class="float-right"><?= $user_Permissions ?></a>
            </li>
        </ul>


    </div>
    <!-- /.card-body -->
    <?php if ($_SERVER['REQUEST_URI'] != '/userEditarPerfil.view.php') {

        echo '
        <div class="card-footer">
            <a href="userEditarPerfil.view.php" class="btn btn-primary btn-block"><b>Editar perfil</b></a>
        </div>';
    } ?>

</div>