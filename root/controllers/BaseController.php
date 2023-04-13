<?php
class BaseController
{
    // ビュー
    protected $view;
    // モデル
    protected $model;

    // コンストラクタ
    public function __construct()
    {
        $this->view = new BaseView();
    }

    // モデルをロードする
    protected function loadModel($model_name)
    {
        require_once "models/{$model_name}.php";
        $this->model = new $model_name();
    }

    // 画面をレンダリングする
    protected function render($template, $params = [])
    {
        $this->view->render($template, $params);
    }
}
?>