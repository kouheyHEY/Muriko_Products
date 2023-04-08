<?php
    // 記事idの設定
    $article_id = "about";

    // 記事ファイルの読み込み
    $about_filepath = DIRPATH_ARTICLE_JSON . "/" . $article_id . ".json";
    $about_info_json = jsonToObj($about_filepath);

?>