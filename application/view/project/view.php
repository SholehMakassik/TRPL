<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" method="post" action="<?php echo URL; ?>project/send/<?php echo $project->ProjectID ?>">
                <fieldset>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ClientMail">Client (E-Mail)</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control input-md"
                                   value="<?php echo htmlspecialchars($project->ClientMail, ENT_QUOTES, 'UTF-8'); ?>"
                                   disabled>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ProjectName">Judul Proyek</label>
                        <div class="col-md-5">

                            <input type="text" class="form-control input-md"
                                   value="<?php echo htmlspecialchars($project->ProjectName, ENT_QUOTES, 'UTF-8'); ?>"
                                   disabled>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Deadline">Deadline</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control input-md"
                                   value="<?php echo htmlspecialchars($project->Deadline, ENT_QUOTES, 'UTF-8'); ?>"
                                   disabled>

                        </div>
                    </div>
                    <?php if($project->Complete == 1){?>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="CompleteDate">Tanggal Selesai</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control input-md"
                                   value="<?php echo htmlspecialchars($project->CompleteDate, ENT_QUOTES, 'UTF-8'); ?>"
                                   disabled>

                        </div>
                    </div>
                    <?php } ?>

                    <!-- Appended Input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Proposal">Proposal</label>
                        <div class="col-md-5">
                            <label class="control-label"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a download href="<?php echo URL . 'proposal/' . $project->Proposal ?>"><?php echo $project->Proposal ?></a></label>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ProjectCategory">Kategori</label>
                        <div class="col-md-5">
                            <label class="control-label"> <?php foreach ( $category as $cat ){ if (in_array($cat->CategoryID,$pCat)){ echo '<span class="label label-default">'. $cat->CategoryName .'</span> '; } } ?> </label>

                        </div>
                    </div>
                    <!-- SendMail-->
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <input type="hidden" name="Proposal"
                                   value="<?php echo htmlspecialchars($project->Proposal, ENT_QUOTES, 'UTF-8'); ?>"/>
                            <input type="submit" class="btn btn-block btn-primary" onclick="return confirm('Apa anda yakin akan mengirim?')" name="submit_send_mail" value="Kirim">
                        </div>
                    </div>

                </fieldset>
            </form>
            <hr>
        </div>

        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default col-md-12">
                <div class = "row">
                <div class="col-md-offset-3 col-md-6">
                <h3 class="text-center">Tugas</h3>
                </div>
                <div class="col-md-3">
                    <h3 class="text-center hidden-xs"><a href="<?php echo URL.'task/add/'.$project->ProjectID ; ?>" class="pull-right btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i></a></h3>
                    <a href="<?php echo URL.'task/add/'.$project->ProjectID ; ?>" class=" visible-xs btn-block btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
                </div>
                <hr>

                <!-- Trigger the modal with a button -->
                <?php foreach ($task as $value) { ?>

                    <div class="btn-group btn-group-justified btn-block">
                        <div class="btn-group" style="width:85%">
                            <a class="btn <?php if ($value->TaskStatus == 0) {
                                echo "btn-info";
                            } else {
                                echo "btn-success";
                            } ?> btn-block"
                                    href="<?php echo URL; ?>task/view/<?php echo $value->TaskID ?>"><?php echo $value->TaskName ?></a>
                        </div>
                        <?php if ($value->TaskAuthor == $_SESSION['Username']) { ?>
                            <div class="btn-group " style="width:15%">
                                <a class="btn btn-default btn-block"
                                        href="<?php echo URL. 'task/edit/'.$value->TaskID ?>"><i
                                            class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                            </div>
                        <?php } ?>
                    </div>

                <?php }
                unset($value) ?>
                <hr>
            </div>
        </div>
    </div>
</div>
