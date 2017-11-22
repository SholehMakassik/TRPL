<?php $needJS = array("datepicker", "chosen"); ?>
<style type="text/css"> @import url("<?php echo URL; ?>css/bootstrap-datepicker.min.css"); </style>
<style type="text/css"> @import url("<?php echo URL; ?>css/chosen.min.css"); </style>
<div class="container">
    <form class="form-horizontal" action="<?php echo URL; ?>expense/addExpense" method="POST"
          enctype="multipart/form-data">
        <fieldset>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Project">Project</label>
                <div class="col-md-5">
                    <select id="Project" name="Project" class="form-control chosen" data-placeholder="Pilih proyek"
                            required>
                        <?php foreach ($project as $val) { ?>
                            <option value="<?php echo $val->ProjectID ?>"><?php echo $val->ProjectName ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="expType">Jenis Pengeluaran</label>
                <div class="col-md-5">
                    <select id="expType" name="expType" class="form-control chosen"
                            required>
                        <option value="Konsumsi">Konsumsi</option>
                        <option value="Transportasi">Transportasi</option>
                        <option value="Komunikasi">Komunikasi</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="expNominal">Nominal</label>
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon">Rp</span>
                        <input type="number" required min="100" name="expNominal" class="form-control" aria-label="">
                        <span class="input-group-addon">.-</span>
                    </div>
                </div>
            </div>


            <!-- Appended Input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="expProof">Bukti Pengeluaran</label>
                <div class="col-md-5">

                    <input type="file" required name="expProof" accept="image/*">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit_form"></label>
                <div class="col-md-4">

                    <input type="submit" class="btn btn-primary" name="submit_insert_expense" value="Simpan">

                </div>
            </div>

        </fieldset>
    </form>

</div>