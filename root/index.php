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
$controller_name = 'AboutController';
$action_name = 'index';

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
    $controller_name = ucfirst($parameters[1]) . 'Controller';
    $action_name = 'index';

    // 入力済みパラメータ
    $editInput = array();

    if (isset($parameters[2])) {
        if($parameters[2] === 'confirm'){
            // ~/edit/confirm にアクセスした場合
            // 確認画面遷移用フラグ
            $flg_confirm = true;

            // タイトルが入力済の場合
            if (isset($_POST['edit-title']) && !empty($_POST['edit-title'])) {
                $editInput['edit-title'] = $_POST['edit-title'];
                // セッション変数に入力値を保存
                $_SESSION['edit-title'] = $_POST['edit-title'];
            } else {
                $_SESSION['edit-title'] = "";
                $flg_confirm = false;
            }

            // タグが入力済の場合
            if (isset($_POST['edit-tag']) && !empty($_POST['edit-tag'])) {
                $editInput['edit-tag'] = $_POST['edit-tag'];
                // セッション変数に入力値を保存
                $_SESSION['edit-tag'] = $_POST['edit-tag'];
            } else {
                $_SESSION['edit-tag'] = "";
                $flg_confirm = false;
            }

            // 記事内容が入力済の場合
            if (isset($_POST['edit-content']) && !empty($_POST['edit-content'])) {
                $editInput['edit-content'] = $_POST['edit-content'];
                // セッション変数に入力値を保存
                $_SESSION['edit-content'] = $_POST['edit-content'];
            } else {
                $_SESSION['edit-content'] = "";
                $flg_confirm = false;
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
            // 各値を変数にセット
            $postInput['post-title'] = '';
            $postInput['post-tag'] = '';
            $postInput['post-content'] = '';

            // 存在チェック用の配列キー文字列のリスト
            $postValueKey = array(
                'post-title',
                'post-tag',
                'post-content'
            );

            foreach($postValueKey as $key){
                // キーが存在する場合
                if(array_key_exists($key, $_POST)){
                    // キーとセットの入力値を変数に設定する
                    $postInput[$key] = $_POST[$key];
                }
            }

            // パラメータの最後に、入力項目の値を設定
            array_push($parameters, $postInput);
            
            // 記事投稿完了画面に遷移
            $action_name = 'post';
        }

    } else {
        // 入力値が保存されている場合
        if (isset($_SESSION['edit-title'])) {
            $editInput['edit-title'] = $_SESSION['edit-title'];
        }
        if (isset($_SESSION['edit-tag'])) {
            $editInput['edit-tag'] = $_SESSION['edit-tag'];
        }
        if (isset($_SESSION['edit-content'])) {
            $editInput['edit-content'] = $_SESSION['edit-content'];
        }

        // パラメータの最後に、入力項目の値を設定
        array_push($parameters, $editInput);

    }

} elseif ($parameters[1] === 'signin') { 
    // ~/signin にアクセスした場合 
    $controller_name = ucfirst($parameters[1]) . 'Controller'; 
    $action_name = 'index';
}


// コントローラのファイルを読み込む
require_once('controllers/' . $controller_name . '.php');

// コントローラのインスタンスを作成する
$controller = new $controller_name();

// アクションを実行する
$controller->$action_name($parameters);
