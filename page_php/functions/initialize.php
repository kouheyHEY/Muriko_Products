<?php

    /**
     * マスタファイルを読み込み、システム情報、カテゴリ情報を取得する
     * 
     */
    function getMaster(){
        // システムマスタファイルを読み込む
        $SYSTEM_MASTER_INFO = jsonToObj(FILEPATH_SYSTEM_MASTER);

        // タイトルとバージョン情報を定義する
        $_SESSION["SYSTEM_TITLE"] = $SYSTEM_MASTER_INFO['SYSTEM_TITLE'];
        $_SESSION["SYSTEM_VERSION"] = $SYSTEM_MASTER_INFO['SYSTEM_VERSION'];

        // カテゴリマスタファイルを読み込む
        $CATEGORY_MASTER_INFO = jsonToObj(FILEPATH_CATEGORY_MASTER);

        // カテゴリ情報を定義する
        $_SESSION["CATEGORIES"] = $CATEGORY_MASTER_INFO['CATEGORIES'];
        $_SESSION["CATEGORY_DISP_NAME"] = $CATEGORY_MASTER_INFO['CATEGORY_DISP_NAME'];

        // カテゴリを「GAME」で初期化する
        $_SESSION['CATEGORY'] = $_SESSION["CATEGORIES"][0];
    }

    // [分岐]セッションの開始状況によって分岐する
    if (session_status() === PHP_SESSION_NONE) {
        // セッションが開始していない場合
        
        // セッションを開始する
        session_start();
    }

    // [分岐]初期化処理フラグの値によって分岐する
    if (!isset($_SESSION["INITIALIZE_FLG"]) || $_SESSION["INITIALIZE_FLG"] != 1){
        // 初期化処理がされていない場合

        // 初期化処理を行う（getMaster()）
        getMaster();

        // 初期化処理済フラグの値を1にする
        $_SESSION["INITIALIZE_FLG"] = 1;
    }

?>