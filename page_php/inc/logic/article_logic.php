<?php
    // [分岐] 記事idによって分岐
    if(isset($_GET["article_id"])){
        // 記事idが指定されている場合

        // 記事idの設定
        $article_id = $_GET["article_id"];

        // 記事ファイルの読み込み
        $article_filepath = DIRPATH_ARTICLE_JSON . "/" . $_GET["article_id"] . ".json";
        $article_info_json = jsonToObj($article_filepath);
    }else{
        // 記事idが指定されていない場合

        // 記事idの設定
        $article_id = "";
    }
?>