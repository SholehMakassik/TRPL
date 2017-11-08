<?php $needJS = array("datepicker", "chosen"); ?>
<style type="text/css"> @import url("<?php echo URL; ?>css/bootstrap-datepicker.min.css"); </style>
<style type="text/css"> @import url("<?php echo URL; ?>css/chosen.min.css"); </style>
<div class="container">
    <!--Form Edit-->
    <form class="form-horizontal" action="<?php echo URL; ?>task/addTask"
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
                           >

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
                               >
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
                                          name="TaskDesc"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="TaskWorker">Pekerja</label>
                <div class="col-md-5">
                    <select id="TaskWorker" name="TaskWorker[]" class="form-control chosen" multiple="multiple">
                        <?php foreach ($account as $val){?>
                        <option value="<?php echo $val->value ?>" ><?php echo $val->name ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit_form"></label>
                <div class="col-md-4">
                    <input type="hidden" name="ProjectID"
                           value="<?php echo $ProjectID; ?>"/>
                    <input type="submit" class="btn btn-primary"
                           name="submit_insert_task" value="Simpan">

                </div>
            </div>

        </fieldset>
    </form>

</div>
