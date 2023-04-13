<?php

// URLパラメータを取得する
$request_uri = $_SERVER['REQUEST_URI'];
$query_string = $_SERVER['QUERY_STRING'];
$parameters = explode('/', $request_uri);

// コントローラとアクションの初期値を設定する
$controller_name = 'AboutController';
$action_name = 'index';

// URLパラメータに応じて、コントローラとアクションを設定する
if ($parameters[1] === 'about') {
    // ~/about にアクセスした場合
    $controller_name = 'AboutController';
    $action_name = 'about';

} elseif ($parameters[1] === 'product') {
    // ~/product にアクセスした場合
    if (isset($parameters[2]) && isset($parameters[3])) {
        // ~/product/[文字列]/[数字] にアクセスした場合
        $controller_name = 'ProductController';
        $action_name = 'detail';

    } elseif (isset($parameters[2])) {
        // ~/product/[文字列] にアクセスした場合
        $controller_name = 'ProductController';
        $action_name = 'index';

    }
} elseif ($parameters[1] === 'article') {
    // ~/article にアクセスした場合

    if (isset($parameters[2]) && isset($parameters[3])) {
        // ~/article/[文字列]/[数字] にアクセスした場合
        $controller_name = 'ArticleController';
        $action_name = 'detail';

    } elseif (isset($parameters[2])) {
        // ~/article/[文字列] にアクセスした場合
        $controller_name = 'ArticleController';
        $action_name = 'index';
    }
}

// コントローラのファイルを読み込む
require_once('controllers/' . $controller_name . '.php');

// コントローラのインスタンスを作成する
$controller = new $controller_name();

// アクションを実行する
$controller->$action_name($parameters);

?>