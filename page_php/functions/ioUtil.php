<?php

    /**
     * jsonファイルを読み込み連想配列に変換する
     * @param string $filePath
     * @return array 変換した連想配列
     */
    function jsonToObj($filePath){

        // jsonファイルの読み込み
        $dataJson = file_get_contents($filePath);
        $dataJson = mb_convert_encoding($dataJson, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

        // 文字列データを連想配列に変換
        $dataJson = json_decode($dataJson, true);

        // 連想配列をreturn
        return $dataJson;
    }

?>