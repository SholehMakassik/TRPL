<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row form-group">
                <div class="col-md-12">
                    <div class="text-center visible-xs">

                        <a class="btn btn-primary" href="<?php echo URL . 'account/add/'; ?>"><i class="fa fa-plus"
                                                                                                 aria-hidden="true"></i>
                            Tambah Pengguna</a>
                    </div>
                    <div class="pull-right hidden-xs">

                        <a class="btn btn-primary" href="<?php echo URL . 'account/add/'; ?>"><i class="fa fa-plus"
                                                                                                 aria-hidden="true"></i>
                            Tambah Pengguna</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Level
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($account as $value){ ?>
                        <tr>
                            <td>
                                <?php echo $value->UserID; ?>
                            </td>
                            <td>
                                <?php echo $value->Username; ?>
                            </td>
                            <td>
                                <?php echo $value->UserLevel; ?>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="<?php echo URL . 'account/edit/'.$value->UserID; ?>">
                                    <i class="fa fa-pencil" aria-hidden="true"></i></a>
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