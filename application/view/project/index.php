<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo URL . 'project'; ?>">Project</a></li>
        <li class="active"><a href="<?php echo URL . 'project/' . htmlspecialchars($submenu, ENT_QUOTES, 'UTF-8'); ?>"><?php echo ucfirst($submenu) ?></a></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row form-group">
                <div class="col-md-12">
                    <div class="text-center visible-xs">
                        <!--    <a class="btn btn-success" href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Lihat Jadwal</a>-->
                        <?php if ($_SESSION['UserLevel'] == 'CustomerService') { ?>
                            <a class="btn btn-primary" href="<?php echo URL . 'project/add/'; ?>"><i class="fa fa-plus"
                                                                                                     aria-hidden="true"></i>
                                Tambah Proyek</a>
                        <?php } ?>
                    </div>
                    <div class="pull-right hidden-xs">

                        <?php if ($_SESSION['UserLevel'] == 'CustomerService') { ?>
                            <a class="btn btn-primary" href="<?php echo URL . 'project/add/'; ?>"><i class="fa fa-plus"
                                                                                                     aria-hidden="true"></i>
                                Tambah Proyek</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Client (E-Mail)
                                </th>
                                <th>
                                    Judul Proyek
                                </th>
                                <th class="text-center">
                                    Deadline
                                </th>
                                <th>
                                    File Proposal
                                </th>
                                <th class="text-center">
                                    Sepakat
                                </th>
                                <th class="text-center">
                                    Selesai
                                </th>
                                <th class="text-center">
                                    Aksi
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($project as $project) { ?>
                                <tr>
                                    <td>
                                        <?php if (isset($project->ProjectID)) echo htmlspecialchars($project->ProjectID, ENT_QUOTES, 'UTF-8'); ?>
                                    </td>
                                    <td>
                                        <?php if (isset($project->ClientMail)) echo htmlspecialchars($project->ClientMail, ENT_QUOTES, 'UTF-8'); ?>
                                    </td>
                                    <td>
                                        <?php if (isset($project->ProjectName)) echo htmlspecialchars($project->ProjectName, ENT_QUOTES, 'UTF-8'); ?>
                                    </td>
                                    <td>
                                        <?php if (isset($project->Deadline)) echo htmlspecialchars($project->Deadline, ENT_QUOTES, 'UTF-8'); ?>
                                    </td>
                                    <td>
                                        <?php if (isset($project->Proposal)) echo htmlspecialchars($project->Proposal, ENT_QUOTES, 'UTF-8'); ?>
                                    </td>
                                    <td class="text-center">
                                        <i class="fa fa-<?php if ($project->Deal==1){ echo "check";}else{echo "times";} ?>" aria-hidden="true"></i>
                                    </td>
                                    <td class="text-center">
                                        <i class="fa fa-<?php if ($project->Complete==1){ echo "check";}else{echo "times";} ?>" aria-hidden="true"></i>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-primary"
                                           href="<?php echo URL . 'project/view/' . htmlspecialchars($project->ProjectID, ENT_QUOTES, 'UTF-8'); ?>"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                        <?php if ($_SESSION['UserLevel'] != 'Karyawan') { ?>
                                            <a class="btn btn-default"
                                               href="<?php echo URL . 'project/edit/' . htmlspecialchars($project->ProjectID, ENT_QUOTES, 'UTF-8'); ?>"><i
                                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a class="btn btn-danger"
                                               href="<?php echo URL . 'project/deleteProject/' . htmlspecialchars($project->ProjectID, ENT_QUOTES, 'UTF-8'); ?>"><i
                                                        onclick="return confirm('Apa anda yakin?')"
                                                        class="fa fa-trash" aria-hidden="true"></i></a>
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