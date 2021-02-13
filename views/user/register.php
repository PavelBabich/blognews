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
            <div class="col-md-6 col-md-offset-3">

                <?php if ($result) : ?>
                    <div class="col-md-8 col-md-offset-1">
                        <h2>Вы зарегистрированы!</h2>
                        <div class="text-xs-center">
                            <a href="/user/login" class="btn btn-block btn-primary">Авторизоваться</a>
                        </div>
                    </div>
                <?php else : ?>
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
                            <label for="inputName" class="control-label">Ваше имя</label>
                            <input name="name" value="<?php echo $name; ?>" type="text" class="form-control" id="inputName" placeholder="Введите Ваше имя" required>
                        </div>
                        <div class="form-group">
                            <label for="inputSurName" class="control-label">Ваша фамилия</label>
                            <input name="surname" value="<?php echo $surName; ?>" type="text" class="form-control" id="inputSurName" placeholder="Введите Вашу фамилию" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Ваш E-mail</label>
                            <input name="email" value="<?php echo $email; ?>" type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Вы не правильно ввели Ваш E-mail" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="control-label">Введите пароль</label>
                            <div class="form-inline row">
                                <div class="form-group col-sm-6">
                                    <input name="password1" value="<?php echo $password1; ?>" type="password" data-toggle="validator" data-minlength="6" class="form-control" id="inputPassword" placeholder="123456" required>
                                    <span class="help-block">Минимум 6 значений</span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input name="password2" value="<?php echo $password2; ?>" type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Ошибка! Пароли не совпадают!" placeholder="Повторите пароль" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="terms" data-error="Прежде чем оправить данные" required>
                                    Докажите что Вы человек
                                </label>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button name="submit" value="submit" type="submit" class="btn btn-primary">Отправить</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>

</html>