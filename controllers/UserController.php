<?php

include_once ROOT . '/models/User.php';

class UserController
{

    //регистрация пользователя
    public function actionRegister()
    {

        $name = '';
        $surName = '';
        $email = '';
        $password1 = '';
        $password2 = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $surName = $_POST['surname'];
            $email = $_POST['email'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];

            $errors = false;

            //валидация форм
            if (!User::chekName($name)) {
                $errors[] = 'Имя не должно быть короче 2 символов';
            }

            if (!User::chekSurName($surName)) {
                $errors[] = 'Фамилия не должна быть короче 2 символов';
            }

            if (!User::chekEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!User::chekPassword($password1)) {
                $errors[] = 'Пароль не должен быть короче 6 символов';
            }

            if (!User::chekMatchPassword($password1, $password2)) {
                $errors[] = 'Пароли не совпадают';
            }

            if (User::checkEmailExist($email)) {
                $errors[] = 'Такой email уже существует';
            }

            if ($errors == null) {

                //вызов функции регистрации
                $result = User::register($name, $surName, $email, $password1);
            }
        }

        require_once ROOT . '/views/user/register.php';

        return true;
    }

    //аутенитфикация и авторизация пользователя
    public function actionLogin()
    {

        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            //валидация форм
            if (!User::chekEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!User::chekPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 символов';
            }

            //аутентификация пользователя
            $user = User::checkUserData($email, $password);

            $userId = $user['id'];

            if ($userId == false) {
                $errors[] = 'Введены неправильные даные';
            } else {

                //авторизация пользователя
                User::auth($userId);

                if ($user['role'] == 'admin') {
                    User::checkAdmin($userId);
                }

                header("Location: /");
            }
        }

        require_once ROOT . '/views/user/login.php';

        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user'], $_SESSION['admin']);

        header("Location: /user/login");
    }
}
