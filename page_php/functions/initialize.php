<?php

    /**
     * マスタファイルを読み込み、システム情報、カテゴリ情報を取得する
     * 
     */
    function getMaster(){
        // 各マスタファイルを読み込む
        $MASTER_INFO = jsonToObj(FILEPATH_MASTER);

        // タイトルとバージョン情報を定義する
        $_SESSION["SYSTEM_TITLE"] = $MASTER_INFO['MST_SYSTEM']['SYSTEM_TITLE'];
        $_SESSION["SYSTEM_VERSION"] = $MASTER_INFO['MST_SYSTEM']['SYSTEM_VERSION'];

        // コンテンツ情報を定義する
        $_SESSION["CONTENTS"] = $MASTER_INFO['MST_CONTENT']['CONTENTS'];
        $_SESSION["CONTENT_DISP_NAME"] = $MASTER_INFO['MST_CONTENT']['CONTENT_DISP_NAME'];
        $_SESSION["CONTENT_URL_NAME"] = $MASTER_INFO['MST_CONTENT']['CONTENT_URL_NAME'];

        // コンテンツを「ABOUT」で初期化する
        $_SESSION['CONTENT'] = $_SESSION["CONTENTS"][0];

        // カテゴリ情報を定義する
        $_SESSION["CATEGORIES"] = $MASTER_INFO['MST_CATEGORY']['CATEGORIES'];
        $_SESSION["CATEGORY_DISP_NAME"] = $MASTER_INFO['MST_CATEGORY']['CATEGORY_DISP_NAME'];

        // カテゴリを「GAME」で初期化する
        $_SESSION['CATEGORY'] = $_SESSION["CATEGORIES"][0];

        // 記事投稿情報を定義する
        $_SESSION['SERVICES'] = $MASTER_INFO['MST_ARTICLE']['SERVICES'];
        $_SESSION['SERVICE_ALIAS'] = $MASTER_INFO['MST_ARTICLE']['SERVICE_ALIAS'];
        $_SESSION['SERVICE_URL'] = $MASTER_INFO['MST_ARTICLE']['SERVICE_URL'];

        // 記事一覧参照先を「Zenn.dev」で初期化する
        $_SESSION['SERVICE'] = $_SESSION['SERVICES'][0];

        // プロダクト一覧を読み込む
        $_SESSION['PRODUCT_LIST_JSON'] = $MASTER_INFO['PRODUCT_LIST'];

        // SNSボタン情報を読み込む
        $_SESSION['SNS_BUTTON'] = $MASTER_INFO['SNS_BUTTON'];
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