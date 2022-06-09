<?php

    /**
     * マスタファイルを読み込み、システム情報、カテゴリ情報を取得する
     * 
     */
    function getMaster(){
        // システムマスタファイルを読み込む
        $SYSTEM_MASTER_INFO = jsonToObj(FILEPATH_SYSTEM_MASTER);

        // タイトルとバージョン情報を定義する
        define('SYSTEM_TITLE', $SYSTEM_MASTER_INFO['SYSTEM_TITLE']);
        define('SYSTEM_VERSION', $SYSTEM_MASTER_INFO['SYSTEM_VERSION']);

        // カテゴリマスタファイルを読み込む
        $CATEGORY_MASTER_INFO = jsonToObj(FILEPATH_CATEGORY_MASTER);

        // タイトルとバージョン情報を定義する
        define('CATEGORIES', $CATEGORY_MASTER_INFO['CATEGORIES']);
    }

    getMaster();
?>