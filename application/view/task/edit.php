<?php $needJS = array("datepicker", "chosen"); ?>
<style type="text/css"> @import url("<?php echo URL; ?>css/bootstrap-datepicker.min.css"); </style>
<style type="text/css"> @import url("<?php echo URL; ?>css/chosen.min.css"); </style>
<div class="container">
    <!--Form Edit-->
    <form class="form-horizontal" action="<?php echo URL; ?>task/updateTask"
          method="POST">
        <fieldset>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="TaskName">Nama
                    Tugas</label>
                <div class="col-md-5">
                    <input id="TaskName" name="TaskName" type="text"
                           placeholder="Nama Tugas" class="form-control input-md"
                           required=""
                           value="<?php echo $task->TaskName; ?>">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="TaskDueDate">Jatuh Tempo</label>
                <div class="col-md-5">
                    <div class="input-group date" data-provide="datepicker"
                         data-date-format="yyyy-mm-dd">
                        <input type="text" class="form-control" name="TaskDueDate"
                               placeholder="YYYY-MM-DD" required=""
                               value="<?php echo htmlspecialchars($task->TaskDueDate, ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- text area-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="TaskDesc">Deskripsi Tugas</label>
                <div class="col-md-5">
                                <textarea style="resize:none;" class="form-control" rows="5" id="TaskDesc"
                                          name="TaskDesc"><?php echo $task->TaskDesc; ?></textarea>
                </div>
            </div>

            <!-- check box-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="TaskStatus">Status Tugas</label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="checkboxes-0">
                        <input type="checkbox" name="TaskStatus" id="TaskStatus"
                               value="1" <?php if ($task->TaskStatus == 1) {
                            echo "checked";
                        } ?>>
                        Selesai
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="TaskWorker">Pekerja</label>
                <div class="col-md-5">
                    <select id="TaskWorker" name="TaskWorker[]" class="form-control chosen" multiple="multiple">
                        <?php foreach ($account as $val){?>
                        <option value="<?php echo $val->value ?>" <?php if(in_array($val->value,$worker)) echo 'selected';?> ><?php echo $val->name ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit_form"></label>
                <div class="col-md-4">
                    <input type="hidden" name="ProjectID"
                           value="<?php echo htmlspecialchars($task->ProjectID, ENT_QUOTES, 'UTF-8'); ?>"/>
                    <input type="hidden" name="TaskID"
                           value="<?php echo htmlspecialchars($task->TaskID, ENT_QUOTES, 'UTF-8'); ?>"/>
                    <input type="submit" class="btn btn-primary"
                           name="submit_update_task" value="Simpan">

                </div>
            </div>

        </fieldset>
    </form>

</div>
