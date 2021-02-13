<?php

return array(
    
    'news/([0-9]+)' => 'news/view/$1', //actionView в NewsController
    'news' => 'news/catalog', //actionCatalog в NewsController

    'account' => 'account/index',

    'user/logout' => 'user/logout',
    'user/login' => 'user/login',
    'user/register' => 'user/register', //actionRegister в UserController

    '' => 'news/index',
);