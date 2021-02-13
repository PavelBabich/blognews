<?php

class AccountController{

    public function actionIndex(){

        require_once ROOT . '/views/user/account.php';

        return true;
    }
}