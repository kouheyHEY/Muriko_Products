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
        $exParams['currentContent'] = 'EDIT_CONFIRM';
        // 各項目の入力値を設定
        // 入力チェックも同時に実施し
        // エラーがある場合はエラーメッセージを設定
        
        // 画面の描画
        $this->render('confirmArticle', array_merge($exParams, $params));
    }
}
?>