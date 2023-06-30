<?php

/**
 * 記事をファイルとして投稿
 * @param string $_title タイトル
 * @param string $_tag タグ
 * @param string $_contnet 記事内容
 */
function postArticleJson(string $_title, string $_tag, string $_content){
    try{
        $articleData = array(
            "title" => $_title,
            "content" => $_content
        );

        // 現在時刻を取得
        $currentTimeStamp = new DateTime('now');

        // idを設定
        $id = $currentTimeStamp->format('YmdHis');
        $articleData['id'] = $id;

        // updDateを設定
        $updDate = $currentTimeStamp->format('Y-m-d');
        $articleData['updDate'] = $updDate;

        // updUserを設定
        $updUser = 'Muriko';
        $articleData['updUser'] = $updUser;

        // json形式に変換
        $articleDataJson = json_encode($articleData);

        // 記事の書き出し
        $filePath = DIRPATH_ARTICLE_JSON . "/" . $id . ".json";
        file_put_contents($filePath, $fileDataJson);

        // trueを返す
        return true;
    }catch(Throwable $e){

        // エラー発生時falseを返す
        return false;
    }
}

?>