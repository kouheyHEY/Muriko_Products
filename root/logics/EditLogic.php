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
        $articleData['id'] = dechex($id);

        // updDateを設定
        $updDate = $currentTimeStamp->format('Y-m-d');
        $articleData['updDate'] = $updDate;

        // 投稿ファイルのフォルダ名
        $articleDirMonth = $currentTimeStamp->format('Ymd');
        $articleDir = DIRPATH_ARTICLE_JSON . "/" . $articleDirMonth;

        // フォルダが既に存在するかを確認
        if (!is_dir($articleDir)) {
            // 無ければ作成
            mkdir($articleDir, 0777, true);
        }

        // updUserを設定
        $updUser = 'Muriko';
        $articleData['updUser'] = $updUser;

        // json形式に変換
        $articleDataJson = json_encode($articleData, JSON_UNESCAPED_UNICODE);

        // 記事の書き出し
        $filePath = $articleDir . "/" . $id . ".json";
        file_put_contents($filePath, $articleDataJson);

        // trueを返す
        return true;
    }catch(Throwable $e){

        // エラー発生時falseを返す
        return false;
    }
}

?>