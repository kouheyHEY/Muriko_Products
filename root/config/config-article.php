<?php

class ConfigArticle
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

    public static function setArticleData($service, $article)
    {
        if (!isset($articleList[$service])) {
            $articleList[$service] = $article;
        }

        return $articleList[$service];
    }

}

?>