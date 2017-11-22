<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo URL . 'project'; ?>">Project</a></li>
        <li class="active"><a
                    href="<?php echo URL . 'project/view/' . htmlspecialchars($task->ProjectID, ENT_QUOTES, 'UTF-8'); ?>"><?php echo $task->ProjectName ?></a>
        </li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-body">
            <h3 class="text-center"><?php if ($task->TaskStatus == 1) { ?><span style="color:#5CB85C;"><i
                            class="fa fa-check" aria-hidden="true"></i></span><?php } ?><?php echo $task->TaskName ?>
            </h3>
            <h5 class="text-center">oleh <?php echo $task->TaskAuthor ?>
                sampai <?php echo $task->TaskDueDate ?></h5>
            <h5 class="text-center"> Kategori : <?php foreach ( $category as $cat ){ if (in_array($cat->CategoryID,$tCat)){ echo '<span class="label label-default">'. $cat->CategoryName .'</span> '; } } ?></h5>
            <hr>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <p><?php echo $task->TaskDesc ?></p>
                </div>
            </div>
            <hr>
            <!--Comment-->
            <?php foreach ($taskComment as $value) { ?>
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <dl>
                            <dt><?php echo $value->ComAuthor; ?></dt>
                            <dd><?php echo $value->Comment; ?></dd>
                            <?php if($value->TaskFiles != null){?>
                            <dd><a href="<?php echo URL.'taskFiles/'.$value->TaskID.'/'. $value->TaskFiles;?>"><i class="fa fa-paperclip" aria-hidden="true"></i> <?php echo $value->TaskFiles;?></a></dd>
                            <?php }?>
                            <hr>
                        </dl>
                    </div>
                </div>
            <?php } ?>
            <!--Comment-->
            <?php if (in_array($_SESSION['UserID'],$worker)){?>
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <form class=" form-horizontal"
                          action="<?php echo URL; ?>task/doComment"
                          method="POST"
                          enctype="multipart/form-data"
                    >
                        <fieldset>

                            <!-- text area-->
                            <div class="form-group">

                                <div class="col-md-12">
                                    <textarea style="resize:none;" class="form-control" rows="5" id="comment"
                                              name="comment" placeholder="Masukkan komentar anda ..."></textarea>
                                </div>
                            </div>
                            <!-- upload-->
                            <div class="form-group">

                                <div class="col-md-12">
                                    <input type="file" name="TaskFiles">
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">

                                <div class="col-md-6">
                                    <input type="hidden" name="TaskID"
                                           value="<?php echo htmlspecialchars($task->TaskID, ENT_QUOTES, 'UTF-8'); ?>"/>
                                    <input type="submit" class="btn btn-primary"
                                           name="submit_comment" value="Kirim">

                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>

            </div>
            <?php }?>
        </div>

    </div>
</div></div>
</div>