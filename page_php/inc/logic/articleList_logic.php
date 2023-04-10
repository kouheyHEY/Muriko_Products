<?php
    // 記事サービスの設定
    if(isset($_GET["SERVICE"])){
        $_SESSION["SERVICE"] = $_GET["SERVICE"];
    }else if(!isset($_SESSION["SERVICE"])){
        initService();
    }

    // 現在のページ番号を取得する
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

    // セッション変数から記事の配列を取得する
    $articleListTmp = $_SESSION['ARTICLE_LIST'];

    // 記事の総数を取得する
    $totalCount = count($articleListTmp);

    // ページ番号に応じて表示する記事の範囲を決定する
    $offset = ($currentPage - 1) * $_SESSION["CONTENT_PER_PAGE"];
    $limit = $_SESSION["CONTENT_PER_PAGE"];
    $articleList = array_slice($articleListTmp, $offset, $limit);
?>