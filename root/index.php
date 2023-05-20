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
            if ($parameters[2] === 'zenn') {
                $articles_tmp = json_decode($_POST['articleList'], true);
                $articles = sortObjAryZenn($articles_tmp['articles'], false);

                ConfigArticle::setArticleData(
                    $parameters[2],
                    $articles
                );
            }
        }
    }
} elseif ($parameters[1] === 'edit') {
    // ~/edit にアクセスした場合
    $controller_name = ucfirst($parameters[1]) . 'Controller';
    $action_name = 'index';
}

// コントローラのファイルを読み込む
require_once('controllers/' . $controller_name . '.php');

// コントローラのインスタンスを作成する
$controller = new $controller_name();

// アクションを実行する
$controller->$action_name($parameters);

?>