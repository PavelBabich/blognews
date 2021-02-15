<?php

class News
{

    //возвращает одну новость по идентификатору
    public static function getNewsItemById($id)
    {

        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query("SELECT * FROM news WHERE id=" . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();
            $newsItem['date'] = date('F jS Y, g:i A', strtotime($newsItem['date']));

            return $newsItem;
        }
    }

    //возвращает список новостей
    public static function getNewsList($sort, $typeOfSort)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM news ORDER BY $sort $typeOfSort");

        $newsList = array();

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = date('F jS Y', strtotime($row['date']));
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['image'] = $row['image'];
            $newsList[$i]['count_views'] = $row['count_views'];

            $i++;
        }

        return $newsList;
    }

    public static function setCountViews($id)
    {
        $db = Db::getConnection();

        $db->query("UPDATE news SET count_views = count_views + 1 WHERE id=" . $id);
    }

    public static function getImage($ie)
    {
    }

    public static function editNews($id, $options)
    {
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/template/images/{$id}.jpg");
            $options['image'] = "/template/images/{$id}.jpg";
        }

        $db = Db::getConnection();

        $sql = "UPDATE news
                SET 
                    title = :title,
                    short_content = :short_content,
                    content = :content,
                    date = :date,
                    image = :image
                    WHERE id = :id";

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':date', $options['date'], PDO::PARAM_STR);
        $result->bindParam(':image', $options['image'], PDO::PARAM_STR);

        return $result->execute();
    }
}
