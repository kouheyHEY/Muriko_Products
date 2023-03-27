<?php
    // 記事idの設定
    $article_id = "about";

    // 記事ファイルの読み込み
    $article_filepath = DIRPATH_ARTICLE_JSON . "/" . $article_id . ".json";
    $article_info_json = jsonToObj($article_filepath);

?>