<?php

// 設定ファイルの読み込み
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config-master.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config-util.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config-article.php');

// ベースとなるファイルの読み込み
require_once($_SERVER['DOCUMENT_ROOT'] . '/controllers/BaseController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/views/BaseView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/BaseModel.php');


// URLパラメータを取得する
$request_uri = $_SERVER['REQUEST_URI'];
$query_string = $_SERVER['QUERY_STRING'];
$parameters = explode('/', $request_uri);

// コントローラとアクションの初期値を設定する
$controller_name = 'ProductController';
$action_name = 'index';

// OGPの初期値
$_SESSION['OG_TITLE'] = 'Muriko Products';
$_SESSION['OG_DESCRIPTION'] = 'Murikoが制作したツールやゲームを紹介しています。';

// URLパラメータの1項目目に応じて、コントローラとアクションを設定する
if ($parameters[1] === 'about') {
    // ~/about にアクセスした場合
    $controller_name = ucfirst($parameters[1]) . 'Controller';
    $action_name = 'index';
} elseif ($parameters[1] === 'product') {
    // ~/product にアクセスした場合
    $controller_name = ucfirst($parameters[1]) . 'Controller';
    if (isset($parameters[2]) && isset($parameters[3])) {
        // ~/product/[文字列]/[数字] にアクセスした場合
        $action_name = 'detail';
    } elseif (isset($parameters[2])) {
        // ~/product/[文字列] にアクセスした場合
        $action_name = 'index';
    }
} elseif ($parameters[1] === 'article') {
    // ~/article にアクセスした場合
    $controller_name = ucfirst($parameters[1]) . 'Controller';

    if (isset($parameters[2]) && isset($parameters[3])) {
        if (!is_numeric($parameters[3])) {
            // ~/article/[文字列]/[文字列] にアクセスした場合
            $action_name = 'detail';
        } else {
            // ~/article/[文字列]/[数字] にアクセスした場合
            $action_name = 'index';
        }
    } elseif (isset($parameters[2])) {
        // ~/article/[文字列] にアクセスした場合
        $action_name = 'index';

        // 記事一覧をPOSTメソッドで取得後の場合
        if (isset($_POST['articleList'])) {
            // zennの場合
            if ($parameters[2] === 'zenn') {
                $articles_tmp = json_decode($_POST['articleList'], true);
                $articles = sortObjAryZenn($articles_tmp['articles'], false);
            }

            // セッションにサービスごとの記事リストを保存する
            ConfigArticle::setArticleData(
                $parameters[2],
                $articles
            );

        }
    }
} elseif ($parameters[1] === 'edit') {
    // ~/edit にアクセスした場合
    
    // ログインしていなければ、ログインページに遷移
    if (empty($_SESSION['signin-user'])){
        $controller_name = 'SigninController'; 
        $action_name = 'index';
    }else{
        $controller_name = ucfirst($parameters[1]) . 'Controller';
        $action_name = 'index';
    }

    // 入力済みパラメータ
    $editInput = array();

    // 存在チェック用の配列キー文字列のリスト
    $editValueKey = array(
        'edit-title',
        'edit-tag',
        'edit-content'
    );

    if (isset($parameters[2])) {
        if($parameters[2] === 'confirm'){
            // ~/edit/confirm にアクセスした場合
            // 確認画面遷移用フラグ
            $flg_confirm = true;

            foreach($editValueKey as $key){
                // キーが存在する場合 
                if(!empty($_POST[$key])){ 
                    // キーとセットの入力値を変数に設定する 
                    $editInput[$key] = $_POST[$key];
                    $_SESSION[$key] = $_POST[$key]; 
                } else { 
                    $_SESSION[$key] = '';
                    $flg_confirm = false;
                } 
            }

            // 入力確認が正常の場合
            if ($flg_confirm) {
                // 入力確認画面に遷移
                $action_name = 'confirm';
            }

            // パラメータの最後に、入力項目の値を設定
            array_push($parameters, $editInput);

        }else if($parameters[2] === 'post'){
            // ~/edit/post にアクセスした場合

            $postInput = array();
            $postValueKey = array(
                'post-title',
                'post-tag',
                'post-content'
            );

            foreach($postValueKey as $key){
                // キーが存在する場合
                if(!empty($_POST[$key])){
                    // キーとセットの入力値を変数に設定する
                    $postInput[$key] = $_POST[$key];
                } else {
                    $postInput[$key] = '';
                }
            }

            // パラメータの最後に、入力項目の値を設定
            array_push($parameters, $postInput);
            
            // 記事投稿完了画面に遷移
            $action_name = 'post';
        }

    } else {
        $postValueKey = array(
            'post-title',
            'post-tag',
            'post-content'
        );
        
        foreach($postValueKey as $key){ 
            // 入力値が保存されている場合
            if (isset($_SESSION[$key])) {
                $editInput[$key] = $_SESSION[$key];
            }
        }

        // パラメータの最後に、入力項目の値を設定
        array_push($parameters, $editInput);

    }

} elseif ($parameters[1] === 'signin') { 
    // ~/signin にアクセスした場合 

    $controller_name = ucfirst($parameters[1]) . 'Controller'; 
    $action_name = 'index';

    if (isset($parameters[2])) {
        if($parameters[2] === 'auth'){
            // 存在チェック用の配列キー文字列のリスト
            $signinValueKey = array(
                'user-name',
                'password',
            );

            foreach($signinValueKey as $key){
                // キーが存在する場合
                if(!empty($_POST[$key])){
                    // キーとセットの入力値を変数に設定する
                    $parameters[3][$key] = $_POST[$key];
                } else {
                    $parameters[3][$key] = '';
                }
            }
            
        }
        $action_name = 'signin';
    }
}


// コントローラのファイルを読み込む
require_once('controllers/' . $controller_name . '.php');

// コントローラのインスタンスを作成する
$controller = new $controller_name();

// アクションを実行する
$controller->$action_name($parameters);
