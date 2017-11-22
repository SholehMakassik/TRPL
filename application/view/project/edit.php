<?php $needJS = array("datepicker", "chosen"); ?>
<style type="text/css">
    @import url("<?php echo URL; ?>css/bootstrap-datepicker.min.css");
    @import url("<?php echo URL; ?>css/chosen.min.css");
</style>

<div class="container">
    <form class="form-horizontal" action="<?php echo URL; ?>project/updateProject" method="POST"
          enctype="multipart/form-data">
        <fieldset>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="ClientMail">Client (E-Mail)</label>
                <div class="col-md-5">
                    <input id="ClientMail" name="ClientMail" type="email" placeholder="E-Mail Client"
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
                    <a href="<?php echo URL . 'proposal/' . $project->Proposal; ?>"><?php echo htmlspecialchars($project->Proposal, ENT_QUOTES, 'UTF-8'); ?></a>
                    <input type="file" name="Proposal" accept=".pdf">
                    <input id="Proposal" name="Proposal" class="form-control input-md" placeholder="namafile.pdf"
                           type="hidden" required=""
                           value="<?php echo htmlspecialchars($project->Proposal, ENT_QUOTES, 'UTF-8'); ?>">


                </div>
            </div>

            <!-- Appended Input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Contract">Kontrak</label>
                <div class="col-md-5">
                    <?php if ($project->Contract != null){?>
                    <a href="<?php echo URL . 'kontrak/' . $project->Contract; ?>"><?php echo htmlspecialchars($project->Contract, ENT_QUOTES, 'UTF-8'); ?></a>
                    <?php }?>
                    <input type="file" name="Contract" accept=".pdf">
                    <input id="Proposal" name="Contract" class="form-control input-md" placeholder="namafile.pdf"
                           type="hidden" required=""
                           value="<?php echo htmlspecialchars($project->Contract, ENT_QUOTES, 'UTF-8'); ?>">


                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="Proposal">Kategori</label>
                <div class="col-md-5">
                    <select id="ProjectCategory" name="ProjectCategory[]" class="form-control chosen" multiple="multiple" required>
                        <?php foreach ($category as $val){if (!in_array($val->CategoryID,Array(1,2,3))){?>
                            <option value="<?php echo $val->CategoryID ?>" <?php if(in_array($val->CategoryID,$projectCategory)) echo 'selected';?> ><?php echo $val->CategoryName ?></option>
                        <?php }}?>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Price">Harga</label>
                <div class="col-md-5">
                    <input id="Price" name="Price" type="number" min="100" placeholder="Rp"
                           class="form-control input-md"
                           required=""
                           value="<?php if ($project->Price != null){ echo $project->Price; } ?>">

                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit_form"></label>
                <div class="col-md-4">
                    <input type="hidden" name="ProjectID"
                           value="<?php echo htmlspecialchars($project->ProjectID, ENT_QUOTES, 'UTF-8'); ?>"/>
                    <input type="hidden" name="CompleteDate"
                           value="<?php echo htmlspecialchars($project->CompleteDate, ENT_QUOTES, 'UTF-8'); ?>"/>
                    <input type="submit" class="btn btn-primary" name="submit_update_project" value="Simpan">
                </div>
            </div>

        </fieldset>
    </form>

</div>

