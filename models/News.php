<?php

class News{

    //возвращает одну новость по идентификатору
    public static function getNewsItemById($id){

        $id = intval($id);

        if($id){
            $db = Db::getConnection();

            $result = $db->query("SELECT * FROM news WHERE id=".$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();
            $newsItem['date'] = date('F jS Y, g:i A', strtotime($newsItem['date']));
            
            return $newsItem;
        }
    }

    //возвращает список новостей
    public static function getNewsList(){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM news ORDER BY date DESC LIMIT 10");

        $newsList = array();

        $i = 0;
        while($row = $result->fetch()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = date('F jS Y', strtotime($row['date']));
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['preview'] = $row['preview'];

            $i++;
        }

        return $newsList;
    }
}