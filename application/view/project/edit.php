<?php $needJS = array("datepicker"); ?>
<style type="text/css"> @import url("<?php echo URL; ?>css/bootstrap-datepicker.min.css"); </style>

<div class="container">
    <form class="form-horizontal" action="<?php echo URL; ?>project/updateProject" method="POST"
          enctype="multipart/form-data">
        <fieldset>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="ClientMail">Client (E-Mail)</label>
                <div class="col-md-5">
                    <input id="ClientMail" name="ClientMail" type="text" placeholder="E-Mail Client"
                           class="form-control input-md"
                           required=""
                           value="<?php echo htmlspecialchars($project->ClientMail, ENT_QUOTES, 'UTF-8'); ?>">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="ProjectName">Judul Proyek</label>
                <div class="col-md-5">
                    <input id="ProjectName" name="ProjectName" type="text" placeholder="Judul Proyek"
                           class="form-control input-md"
                           required=""
                           value="<?php echo htmlspecialchars($project->ProjectName, ENT_QUOTES, 'UTF-8'); ?>">

                </div>
            </div>

            <!-- Date input -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Deadline">Deadline</label>
                <div class="col-md-5">

                    <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                        <input type="text" class="form-control" name="Deadline" placeholder="YYYY-MM-DD" required=""
                               value="<?php echo htmlspecialchars($project->Deadline, ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="TaskStatus">Status Tugas</label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="checkboxes-0">
                        <input type="checkbox" name="Deal" id="Deal"
                               value="1" <?php if ($project->Deal == 1) {
                            echo "checked";
                        } ?>>
                        Sepakat
                    </label><label class="checkbox-inline" for="checkboxes-0">
                        <input type="checkbox" name="Complete" id="Complete"
                               value="1" <?php if ($project->Complete == 1) {
                            echo "checked";
                        } ?>>
                        Selesai
                    </label>
                </div>
            </div>

            <!-- Appended Input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Proposal">Proposal</label>
                <div class="col-md-5">
                    <input type="file" name="Proposal" accept=".pdf">
                    <input id="Proposal" name="Proposal" class="form-control input-md" placeholder="namafile.pdf"
                           type="hidden" required=""
                           value="<?php echo htmlspecialchars($project->Proposal, ENT_QUOTES, 'UTF-8'); ?>">


                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit_form"></label>
                <div class="col-md-4">
                    <input type="hidden" name="ProjectID"
                           value="<?php echo htmlspecialchars($project->ProjectID, ENT_QUOTES, 'UTF-8'); ?>"/>
                    <input type="submit" class="btn btn-primary" name="submit_update_project" value="Simpan">
                </div>
            </div>

        </fieldset>
    </form>

</div>

