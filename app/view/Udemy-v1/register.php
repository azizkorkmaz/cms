
<!--header-->
<?php require view("static/header")?>

<div class="container">
    <div class="row justify-content-md-center mt-4">

        <div class="col-md-4">
            <form action="" method="post">
                <h3 class="mb-3">Kayıt Ol</h3>

                <?php if ($err = is_error()): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $err?>
                    </div>
                <?php endif; ?>

                <?php if ($success = is_success()): ?>
                    <div class="alert alert-success" role="alert">
                        <?= $success?>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="username">Kullanıcı Adınız</label>
                    <input type="text" class="form-control" value="<?= post("user_name")?>" name="user_name" id="user_name" placeholder="Kullanıcı adınızı yazın..">
                </div>
                <div class="form-group">
                    <label for="email">E-posta Adresiniz</label>
                    <input type="text" class="form-control" value="<?= post("email")?>" name="email" id="email" placeholder="E-posta adresinizi yazın..">
                </div>
                <div class="form-group">
                    <label for="password">Şifreniz</label>
                    <input type="password" class="form-control" value="<?= post("password")?>" name="password" id="password" placeholder="*******">
                </div>
                <div class="form-group">
                    <label for="password-again">Şifreniz (Tekrar)</label>
                    <input type="password" class="form-control" value="<?= post("password_again")?>" name="password_again" id="password_again" placeholder="*******">
                </div>
                <input type="hidden" name="submit" value="1">
                <button type="submit" class="btn btn-primary">Kayıt Ol</button>
            </form>
        </div>

    </div>
</div>

<!--footer-->
<?php require view("static/footer")?>
