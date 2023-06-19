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

        // タイトルが未入力の場合
        // エラーメッセージを設定

        // タイトルをモデルに設定

        // タグが未入力の場合
        // エラーメッセージを設定

        // タグをカンマ区切りで取得しモデルに設定

        // 内容が未入力の場合
        // エラーメッセージを設定

        // Markdown形式の文字列をモデルに設定
        
        // 画面の描画
        $this->render('confirmArticle', array_merge($exParams, $params));
    }
}
?>