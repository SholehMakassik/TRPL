<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row form-group">
                <div class="col-md-12">
                    <div class="text-center visible-xs">
                        <a class="btn btn-primary" href="#" onclick="window.location.reload(true);return false;"><i class="fa fa-refresh"
                                                                                                 aria-hidden="true"></i>
                            Muat Ulang</a>
                    </div>
                    <div class="pull-right hidden-xs">
                        <a class="btn btn-primary" href="#" onclick="window.location.reload(true);return false;"><i class="fa fa-refresh"
                                                                                                 aria-hidden="true"></i>
                            Muat Ulang</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>
                                No.
                            </th>
                            <th>
                                Nama Pengguna
                            </th>
                            <th>
                                Nama Proyek
                            </th>
                            <th>
                                Nama Task
                            </th>
                            <th>
                                Hari Terlewat
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $nomor=1; foreach($penalty as $value){ ?>
                        <tr>
                            <td>
                                <?php echo $nomor++ ?>
                            </td>
                            <td>
                                <?php echo $value->Username ?>
                            </td>
                            <td>
                                <?php echo $value->ProjectName ?>
                            </td>
                            <td>
                                <?php echo $value->TaskName ?>
                            </td>
                            <td>
                                <?php echo $value->PastDays ?>
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