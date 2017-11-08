<?php $needJS = array("datepicker", "chosen", "ekko-lightbox"); ?>
<style type="text/css"> @import url("<?php echo URL; ?>css/ekko-lightbox.css"); </style>
<style type="text/css"> @import url("<?php echo URL; ?>css/bootstrap-datepicker.min.css"); </style>
<style type="text/css"> @import url("<?php echo URL; ?>css/chosen.min.css"); </style>
<div class="container">
    <form class="form-horizontal" action="<?php echo URL; ?>expense/updateExpense" method="POST"
          enctype="multipart/form-data">
        <fieldset>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Project">Project</label>
                <div class="col-md-5">
                    <select id="Project" name="Project" class="form-control chosen" data-placeholder="Pilih proyek"
                            required>
                        <?php foreach ($project as $val) { ?>
                            <option value="<?php echo $val->ProjectID ?>" <?php if($val->ProjectName == $expense->expProject){ echo 'selected';} ?>><?php echo $val->ProjectName ?></option>
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
                        <option value="Konsumsi" <?php if('Konsumsi' == $expense->expType){ echo 'selected';} ?>>Konsumsi</option>
                        <option value="Transportasi" <?php if('Transportasi' == $expense->expType){ echo 'selected';} ?>>Transportasi</option>
                        <option value="Komunikasi" <?php if('Komunikasi' == $expense->expType){ echo 'selected';} ?>>Komunikasi</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="expNominal">Nominal</label>
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon">Rp</span>
                        <input type="number" name="expNominal" class="form-control" value="<?php echo $expense->expNominal ?>" aria-label="">
                        <span class="input-group-addon">.-</span>
                    </div>
                </div>
            </div>


            <!-- Appended Input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="expProof">Bukti Pengeluaran</label>
                <div class="col-md-5">
                    <a href="<?php echo URL . 'expenseFiles/' . $expense->expProof; ?>"
                       data-toggle="lightbox">
                        <img src="<?php echo URL . 'expenseFiles/' . $expense->expProof; ?>"
                             class="img-thumbnail img-responsive">
                    </a>
                    <input type="file" name="expProof">
                </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="expStatus">Status</label>
                <div class="col-md-5">
                    <select id="expStatus" name="expStatus" class="form-control chosen"
                            required>
                        <?php if ($_SESSION['UserLevel'] == 'SuperAdmin') { ?>
                            <option value="Disetujui/Belum Lunas">Disetujui/Belum Lunas</option>
                        <?php } else { ?>
                            <option value="Belum Diperiksa">Belum Diperiksa</option>
                            <option value="Lunas">Lunas</option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit_form"></label>
                <div class="col-md-4">
                    <input type="hidden" name="expID"
                           value="<?php echo $expense->expID; ?>"/>
                    <input type="hidden" name="expProof"
                           value="<?php echo $expense->expProof; ?>"/>
                    <input type="submit" class="btn btn-primary" name="submit_update_expense" value="Simpan">

                </div>
            </div>

        </fieldset>
    </form>

</div>