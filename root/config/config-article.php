<?php

class ConfigArticle
{
    // 記事リストからデータを取得する関数
    public static function getArticleData($service)
    {
        // 記事リストがあれば、それを返す
        if (isset($_SESSION['articles'][$service])) {
            return $_SESSION['articles'][$service];
        } else {
            return null;
        }
    }

    public static function setArticleData($service, $article)
    {
        if (!isset($_SESSION['articles'][$service])) {
            $_SESSION['articles'][$service] = $article;
        }

        return $_SESSION['articles'][$service];
    }

}

?>