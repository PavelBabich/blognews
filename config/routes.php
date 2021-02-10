<?php

return array(
    
    'news/([0-9]+)' => 'news/view/$1', //actionView в NewsController
    'news' => 'news/catalog', //actionIndex в NewsController
    '' => 'news/index',
);