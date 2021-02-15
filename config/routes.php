<?php

return array(
    
    'news/([0-9]+)' => 'news/view/$1', //actionView в NewsController
    'news/edit/([0-9]+)' => 'news/edit/$1',
    'news' => 'news/catalog', //actionCatalog в NewsController

    'account/edit' => 'account/edit',
    'account' => 'account/index',

    'user/logout' => 'user/logout',
    'user/login' => 'user/login',
    'user/register' => 'user/register', //actionRegister в UserController

    '' => 'main/index',
);