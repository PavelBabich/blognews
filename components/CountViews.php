<?php

class CountViews
{

    public static function setCountViews($id)
    {
        $db = Db::getConnection();

        $db->query("UPDATE news SET count_views = count_views + 1 WHERE id=".$id);
    }
}
