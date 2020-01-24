<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <?php $tempM = new Message();
        $tempU = new User();
        $messages = $tempM->getMessagesFromUser($user_Id);

        ?>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-info navbar-badge"><?= sizeof($messages) ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <?php


                foreach ($messages as $index => $item) {
                    $sender = $tempU->findUserById($item['senderId']);
                    $senderName = $sender['username'];
                    echo    '<a href="#" class="dropdown-item">
                                <div class="media">
                                    <img src="dist/img/users/defaultUserImg.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">' . $senderName . '</h3>
                                        <p class="text-sm">' . $item['text'] . '</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>' . $item['date'] . '</p>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>';
                }

                ?>

            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->