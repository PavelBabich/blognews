<?php

class User
{

    //функция регистрации - сохраняет данные в БД
    public static function register($name, $surName, $email, $password1)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO users (name, surname, email, password)
        VALUES (:name, :surname, :email, :password)';

        $result = $db->prepare($sql);
        return $result->execute([':name' => $name, ':surname' => $surName, ':email' => $email, ':password' => $password1]);
    }

    //функции валидации

    //проверяет введенное имя: не меньше 2 символов
    public static function chekName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    //проверяет введенную фамилию: не меньше 2 символов
    public static function chekSurName($surName)
    {
        if (strlen($surName) >= 2) {
            return true;
        }
        return false;
    }

    //проверяет введенный email на корректность
    public static function chekEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    //проверяет введенный email на существование
    public static function checkEmailExist($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        }
        return false;
    }

    //проверяет введенный пароль: не меньше 6 символов
    public static function chekPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    //проверяет введенные пароли на совпадение
    public static function chekMatchPassword($password1, $password2)
    {
        if ($password1 === $password2) {
            return true;
        }
        return false;
    }

    //Проверяет, существует ли пользователь с данными email и password
    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
        $result = $db->prepare($sql);
        $result->execute([':email' => $email, ':password' => $password]);

        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }
}
