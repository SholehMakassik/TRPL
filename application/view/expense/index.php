<?php $needJS = array("ekko-lightbox"); ?>
<style type="text/css"> @import url("<?php echo URL; ?>css/ekko-lightbox.css"); </style>
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo URL . 'expense'; ?>">Expense</a></li>
        <li class="active"><a
                    href="<?php echo URL . 'project/' . htmlspecialchars($submenu, ENT_QUOTES, 'UTF-8'); ?>"><?php echo ucfirst($submenu) ?></a>
        </li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row form-group">
                <div class="col-md-12">
                    <div class="text-center visible-xs">
                        <!--    <a class="btn btn-success" href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Lihat Jadwal</a>-->
                        <?php if ($_SESSION['UserLevel'] != 'SuperAdmin') { ?>
                            <a class="btn btn-primary" href="<?php echo URL . 'expense/add/'; ?>"><i class="fa fa-plus"
                                                                                                     aria-hidden="true"></i>
                                Tambah Pengeluaran</a>
                        <?php } ?>
                    </div>
                    <div class="pull-right hidden-xs">

                        <?php if ($_SESSION['UserLevel'] != 'SuperAdmin') { ?>
                            <a class="btn btn-primary" href="<?php echo URL . 'expense/add/'; ?>"><i class="fa fa-plus"
                                                                                                     aria-hidden="true"></i>
                                Tambah Pengeluaran</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th class="col-md-2">
                                    Pemilik
                                </th>
                                <th>
                                    Nominal
                                </th>
                                <th>
                                    Proyek
                                </th>
                                <th>
                                    Tipe Pengeluaran
                                </th>
                                <th class="col-md-2">
                                    Bukti Pembayaran
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($expense as $value) { ?>
                                <tr>
                                    <td>
                                        <?php echo $value->expID; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->expOwner; ?>
                                    </td>
                                    <td>
                                        <?php echo 'Rp' . $value->expNominal . ',-'; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->expProject; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->expType; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo URL . 'expenseFiles/' . $value->expProof; ?>"
                                           data-toggle="lightbox">
                                            <img src="<?php echo URL . 'expenseFiles/' . $value->expProof; ?>"
                                                 class="img-thumbnail img-responsive">
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $value->expStatus; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-default"
                                           href="<?php echo URL . 'expense/edit/'.$value->expID; ?>">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <?php if ($_SESSION['UserLevel']!='SuperAdmin' && $value->expStatus == 'Belum Diperiksa'){ ?>
                                        <a class="btn btn-danger"
                                           href="<?php echo URL . 'expense/delete/'.$value->expID; ?>">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>