<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="<?php echo URL . 'account/updateUser'; ?>">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Edit Pengguna <?php echo '(ID : ' . $account->UserID . ')'; ?></legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Username">Username</label>
                        <div class="col-md-5">
                            <input value="<?php echo $account->Username ?>" id="Username" name="Username" type="text"
                                   placeholder="Username" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Password">Password</label>
                        <div class="col-md-5">
                            <input value="<?php //echo $account->Password ?>" id="Password" name="Password"
                                   type="password" placeholder="Password" class="form-control input-md" >
                            <span class="help-block">Kosongi bila tidak ingin diubah!</span>

                        </div>
                    </div>

                    <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="UserLevel">User Level</label>
                            <div class="col-md-5">
                                <select id="UserLevel" name="UserLevel" class="form-control">
                                    <option <?php if ($account->UserLevel == 'Karyawan') {
                                        echo 'selected';
                                    } ?> value="Karyawan">Karyawan
                                    </option>
                                    <option <?php if ($account->UserLevel == 'CustomerService') {
                                        echo 'selected';
                                    } ?> value="CustomerService">CustomerService
                                    </option>
                                    <option <?php if ($account->UserLevel == 'SuperAdmin') {
                                        echo 'selected';
                                    } ?> value="SuperAdmin">SuperAdmin
                                    </option>
                                </select>
                            </div>
                        </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submit_add_user"></label>
                        <div class="col-md-4">
                            <input type="hidden" name="UserID"
                                   value="<?php echo htmlspecialchars($account->UserID, ENT_QUOTES, 'UTF-8'); ?>"/>
                            <button id="submit_update_user" name="submit_update_user" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>
    </div>
</div>