<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <h3>Masuk</h3>
        <form action="<?php echo URL; ?>account/login" method="POST">
            <div class="form-group">
                <label for="username">Nama Pengguna:</label>
                <input type="text" class="form-control" name="username" required="" id="email">
            </div>
            <div class="form-group">
                <label for="pwd">Kata Sandi:</label>
                <input type="password" class="form-control" name="password" required="" id="pwd">
            </div>
            <?php if (isset($_SESSION["loginError"])) { ?>
                <div id="error" class="alert alert-danger">
                    <strong>Maaf!</strong> Username atau Password tidak valid.
                </div>
            <?php } ?>
            <input type="submit" name="submit_login" class="btn btn-default" value="Login"/>
        </form>
    </div>
</div>
