<?php
    // 設定ファイルの読み込み
    require_once 'config/config.php';

    // URLからコントローラーとアクションを決定する
    $controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'HomeController';
    $actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

    // コントローラーのインスタンス化とアクションの実行
    $controller = new $controllerName();
    $controller->$actionName();

?>