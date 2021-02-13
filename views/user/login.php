<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BlogNews</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
    <script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
    <script src="https://bootstraptema.ru/plugins/2015/b-v3-3-6/bootstrap.min.js"></script>
    <script src="https://bootstraptema.ru/plugins/2016/validator/validator.min.js"></script>
</head>

<body style="height: 100vh; display: flex; align-items: center;">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h1>Вход на сайт</h1>

                <?php if (isset($errors) && is_array($errors)) : ?>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li>
                                <?php echo $error; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <form data-toggle="validator" role="form" method="POST" action="#">

                    <div class="form-group">
                        <label for="inputEmail" class="control-label">Ваш E-mail</label>
                        <input name="email" value="<?php echo $email;?>" type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Вы не правильно ввели Ваш E-mail" required>
                        <div class="help-block with-errors"></div>
                        <label for="inputPassword" class="control-label">Введите пароль</label>
                        <input name="password" value="<?php echo $password?>" type="password" data-toggle="validator" data-minlength="6" class="form-control" id="inputPassword" placeholder="123456" required>
                        <span class="help-block">Минимум 6 значений</span>
                        <div class="text-xs-center">
                            <button name="submit" value="submit" class="btn btn-block btn-primary" type="submit">Вход</button>
                        </div>
                    </div>
                </form>
                <a href="/user/register" style="text-decoration: none;">Не зарегистрированы ?</a>
            </div>
        </div>
    </div>

</body>

</html>