<?php

include_once ROOT . '/models/News.php';

class NewsController
{

    //выводит список новостей
    public function actionCatalog($sort = 'date', $typeOfSort = 'desc')
    {
        switch ($sort) {
            case 'date':
                $sort = 'date';
                break;
            case 'count_views':
                $sort = 'count_views';
                break;
            default:
                $sort = 'date';
                break;
        }

        switch ($typeOfSort) {
            case 'desc':
                $typeOfSort = 'desc';
                break;
            case 'asc':
                $typeOfSort = 'asc';
                break;
            default:
                $typeOfSort = 'desc';
                break;
        }

        $newsList = array();
        $newsList = News::getNewsList($sort, $typeOfSort);

        require_once ROOT . '/views/news/catalog.php';

        return true;
    }

    //выводит новость по идентификатору
    public function actionView($id)
    {
        if ($id) {
            $newsItem = News::getNewsItemById($id);

            require_once ROOT . '/views/news/post.php';
            return true;
        }
    }

    public function actionEdit($id)
    {

        if (!isset($_SESSION['admin'])) {
            die('Access denied');
        }

        $error = false;
        $post = News::getNewsItemById($id);
        $post['date'] = date("Y-m-d H:i:s", strtotime($post['date']));

        if (isset($_POST['submit'])) {
            $options['title'] = $_POST['title'];
            $options['short_content'] = $_POST['shortContent'];
            $options['content'] = $_POST['content'];
            $options['date'] = $_POST['date'];
            $options['image'] = $post['image'];

            if (News::editNews($id, $options)) {
                header("Location: /news/$id");
            } else {
                $error = true;
            }
        }


        require_once ROOT . '/views/news/edit.php';
        return true;
    }
}
