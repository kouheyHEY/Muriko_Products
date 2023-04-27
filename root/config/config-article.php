<?php

class ArticleList
{
    // 記事リストを格納する変数
    private static $articleList = [];

    // 記事リストからデータを取得する関数
    public static function getArticleData($service)
    {
        // 記事リストがあれば、それを返す
        if (isset(self::$articleList[$service])) {
            return self::$articleList[$service];
        } else {
            return null;
        }
    }

}

?>