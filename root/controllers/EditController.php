<?php

//  Markdown処理用のライブラリ
require_once($_SERVER['DOCUMENT_ROOT'] . "/libraries/PHPMarkdownLib/Michelf/MarkdownExtra.inc.php");

use Michelf\MarkdownExtra;

class EditController extends BaseController
{
    public function index($params)
    {
        // モデルを取得
        $this->loadModel('EditModel');
        $exParams = $this->model->getEdit();
        // 現在の表示コンテンツを設定
        $exParams['currentContent'] = 'EDIT';
        // エラー表示用の配列
        $errorList = array();

        // 入力パラメータがある場合は取得
        $inputParams = $params[array_key_last($params)];

        // 入力パラメータが文字列でない場合
        if (!is_string($inputParams)) {
            // タイトルが未入力の場合
            if (
                !isset($inputParams['edit-title'])
            ) {
                // エラーメッセージを設定
                $errorList[] = MSG_NO_TITLE_INPUT;
            }

            // タグが未入力の場合
            if (
                !isset($inputParams['edit-tag'])
            ) {
                // エラーメッセージを設定
                $errorList[] = MSG_NO_TAG_INPUT;
            }

            // コンテンツが未入力の場合
            if (
                !isset($inputParams['edit-content'])
            ) {
                // エラーメッセージを設定
                $errorList[] = MSG_NO_CONTENT_INPUT;
            }
        }

        // 画面の描画
        $this->render(
            'editArticle',
            [
                'currentContent' => $exParams['currentContent'],
                'errorList' => $errorList
            ]
        );
    }

    public function confirm($params)
    {

        // モデルを取得
        $this->loadModel('EditModel');
        $exParams = $this->model->getEdit();
        // 現在の表示コンテンツを設定
        $exParams['currentContent'] = 'CONFIRM';

        // 各項目の入力値を設定
        $inputParams = $params[array_key_last($params)];

        // タイトルを変数に設定
        $editTitle = $inputParams['edit-title'];

        // タグをカンマ区切りで取得し変数に設定
        $editTag = explode(",", $inputParams['edit-tag']);

        // Markdown形式の文字列を変数に設定
        $mdInst = new MarkdownExtra();
        $editContent = $mdInst->transform($inputParams['edit-content']);

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
