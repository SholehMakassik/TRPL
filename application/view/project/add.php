<?php $needJS = array("datepicker"); ?>
<style type="text/css"> @import url("<?php echo URL; ?>css/bootstrap-datepicker.min.css"); </style>
<div class="container">
    <form class="form-horizontal" action="<?php echo URL; ?>project/addProject" method="POST"
          enctype="multipart/form-data">
        <fieldset>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="ClientMail">Client (E-Mail)</label>
                <div class="col-md-5">
                    <input id="ClientMail" name="ClientMail" type="text" placeholder="E-Mail Client"
                           class="form-control input-md"
                           required=""
                           value="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="ProjectName">Judul Proyek</label>
                <div class="col-md-5">
                    <input id="ProjectName" name="ProjectName" type="text" placeholder="Judul Proyek"
                           class="form-control input-md"
                           required=""
                           value="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Deadline">Deadline</label>
                <div class="col-md-5">
                    <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                        <input type="text" class="form-control" name="Deadline" placeholder="YYYY-MM-DD" required=""
                               value="">
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Appended Input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Proposal">Proposal</label>
                <div class="col-md-5">

                    <input type="file" name="Proposal" accept=".pdf">
                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit_form"></label>
                <div class="col-md-4">

                    <input type="submit" class="btn btn-primary" name="submit_insert_project" value="Simpan">

                </div>
            </div>

        </fieldset>
    </form>

</div>