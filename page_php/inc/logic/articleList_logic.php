<?php
    // 記事サービスの設定
    if(isset($_GET["SERVICE"])){
        $_SESSION["SERVICE"] = $_GET["SERVICE"];
    }else if(!isset($_SESSION["SERVICE"])){
        initService();
    }
    
    // セッション変数から、記事一覧を取得する
    $article_list_tmp = $_SESSION['articleList']['articles'];

    // 記事一覧のソート
    $article_list = sortObjAryZenn($article_list_tmp, false);
?>