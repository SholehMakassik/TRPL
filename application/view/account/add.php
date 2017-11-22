<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="<?php echo URL . 'account/addUser'; ?>">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Tambah Pengguna</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Username">Username</label>
                        <div class="col-md-5">
                            <input id="Username" name="Username" type="text" placeholder="Username" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Password">Password</label>
                        <div class="col-md-5">
                            <input id="Password" name="Password" type="password" placeholder="Password" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="UserLevel">User Level</label>
                        <div class="col-md-5">
                            <select id="UserLevel" name="UserLevel" class="form-control">
                                <option value="Karyawan">Karyawan</option>
                                <option value="CustomerService">CustomerService</option>
                                <option value="SuperAdmin">SuperAdmin</option>
                            </select>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submit_add_user"></label>
                        <div class="col-md-4">
                            <button id="submit_add_user" name="submit_add_user" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>
    </div>
</div>