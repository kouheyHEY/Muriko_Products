<?php

//  Markdown処理用のライブラリ
require_once($_SERVER['DOCUMENT_ROOT'] . "/libraries/PHPMarkdownLib/Michelf/Markdown.inc.php");


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
        $exParams['currentContent'] = 'CONFIRM';

        // 各項目の入力値を設定
        // 入力チェックも同時に実施し
        // エラーがある場合はエラーメッセージを設定
        $inputParams = $params[array_key_last($params)];

        // タイトルが未入力の場合
        // エラーメッセージを設定

        // タイトルを変数に設定
        $editTitle = $inputParams['edit-title'];

        // タグが未入力の場合
        // エラーメッセージを設定

        // タグをカンマ区切りで取得し変数に設定
        $editTag = explode(",", $inputParams['edit-tag']);

        // 内容が未入力の場合
        // エラーメッセージを設定

        // Markdown形式の文字列を変数に設定
        $editContent = Michelf\Markdown::defaultTransform($inputParams['edit-content']);

        // 画面の描画
        $this->render(
            'confirmArticle',
            [
                'currentContent' => $exParams['currentContent'],
                'editTitle' => $editTitle,
                'editTag' => $editTag,
                'editContent' => $editContent
            ]
        );
    }
}
?>