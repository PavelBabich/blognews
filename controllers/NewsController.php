<?php

include_once ROOT . '/models/News.php';

class NewsController
{

    public function actionIndex(){
        require_once(ROOT.'/views/site/index.php');
        return true;
    }

    //выводит список новостей
    public function actionCatalog()
    {
        $newsList = array();
        $newsList = News::getNewsList();
        require_once (ROOT.'/views/site/catalog.php');

        return true;
    }

    //выводит новость по идентификатору
    public function actionView($id)
    {
        if ($id) {
            $newsItem = News::getNewsItemById($id);

            require_once(ROOT.'/views/site/post.php');
            return true;
        }
    }
}
