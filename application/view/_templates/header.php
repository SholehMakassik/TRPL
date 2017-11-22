<!DOCTYPE html>
<?php $needJS = array(); ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo SITE_NAME ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo URL; ?>/img/favicon.ico" type="image/x-icon" sizes="16x16">
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<!--    <div class="logo"></div>-->

<nav class="navbar navbar-default" style="border-radius:0px">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo SITE_NAME; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php if ($_SESSION['Controller'] == 'home') echo "class='active'"; ?>><a
                            href="<?php echo URL; ?>">Home</a></li>
                <li class="dropdown <?php if ($_SESSION['Controller'] == 'project') echo "active"; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Proyek <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo URL; ?>project">Semua Proyek</a></li>
                        <li><a href="<?php echo URL; ?>project/dealt">Proyek Sepakat</a></li>
                        <li><a href="<?php echo URL; ?>project/completed">Proyek Selesai</a></li>
                    </ul>
                </li>
                <li class="<?php if ($_SESSION['Controller'] == 'expense') echo "active"; ?>"><a
                            href="<?php echo URL; ?>expense">Pengeluaran</a></li>
                <li><a href="<?php echo URL; ?>invoice">Tagihan</a></li>
                <?php if (isset($_SESSION['UserLevel'])) {
                    if ($_SESSION['UserLevel'] == 'SuperAdmin') { ?>
                        <li class=" dropdown <?php if ($_SESSION['Controller'] == 'penalty') echo "active"; ?>"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                                                                                                   aria-expanded="false" href="#">Pelanggaran <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo URL . 'penalty/task' ?>">Pelanggaran Tugas</a></li>
                                <li><a href="<?php echo URL.'penalty/project'; ?>">Pelanggaran Proyek</a></li>
                                <li><a href="<?php echo URL.'penalty/invoice'; ?>">Pelanggaran Tagihan</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo URL . 'account' ?>">Akun</a></li>
                    <?php }
                } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <?php if (isset($_SESSION['Username'])) { ?>
                    <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['Username'] ?>
                        </a></li>
                    <li><a href="<?php echo URL; ?>account/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
                            Logout</a>
                    </li>

                <?php } else { ?>
                    <li><a href="<?php echo URL; ?>account/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                    </li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
