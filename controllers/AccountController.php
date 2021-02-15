<?php

include_once ROOT . '/models/User.php';

class AccountController{

    public function actionIndex(){

        $userId = $_SESSION['user'];

        $user = User::getUserById($userId);

        require_once ROOT . '/views/account/index.php';

        return true;
    }
}