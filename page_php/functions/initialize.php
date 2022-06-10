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

        // カテゴリ情報を定義する
        define('CATEGORIES', $CATEGORY_MASTER_INFO['CATEGORIES']);
        define('CATEGORY_DISP_NAME', $CATEGORY_MASTER_INFO['CATEGORY_DISP_NAME']);

        // カテゴリを「GAME」で初期化する
        if(!isset($_SESSION['CATEGORY'])){
            $_SESSION['CATEGORY'] = CATEGORIES[0];
        }
    }

    getMaster();
?>