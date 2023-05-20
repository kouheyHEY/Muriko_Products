<?php

class EditController extends BaseController
{
    public function index($params)
    {
        // モデルを取得
        $this->loadModel('EditModel');
        $exParams = $this->model->getEdit();
        // 現在の表示コンテンツを設定
        $exParams['currentContent'] = 'EDIT';
        // 画面の描画
        $this->render('editArticle', array_merge($exParams, $params));
    }
    public function confirm($params)
    {
        // モデルを取得
        $this->loadModel('EditModel');
        $exParams = $this->model->getEdit();
        // 現在の表示コンテンツを設定
        $exParams['currentContent'] = 'EDIT';
        // 画面の描画
        $this->render('confirmArticle', array_merge($exParams, $params));
    }
}
?>