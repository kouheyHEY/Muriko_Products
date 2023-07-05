<?php

//  Markdown処理用のライブラリ
require_once($_SERVER['DOCUMENT_ROOT'] . "/libraries/PHPMarkdownLib/Michelf/MarkdownExtra.inc.php");

// ロジック
require_once($_SERVER['DOCUMENT_ROOT'] . "/logics/EditLogic.php");


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
        if (!is_string($inputParams) && !empty($inputParams)) {
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
                'editContent' => $editContent,
                'editContentMd' => $inputParams['edit-content']
            ]
        );
    }

    public function post($params)
    {
        // エラー用フラグ
        $postErrorFlg = false;

        $postTitle = '';
        $postTag = '';
        $postContent = '';

        // 各項目の入力値を取得
        $postParams = $params[array_key_last($params)];

        // 入力値が設定されていない、または空の場合
        if(!isset($postParams) || empty($postParams)){
            // エラー表示用フラグを設定する
            $postErrorFlg = true;

        }else{
            // 各入力値が空の場合、エラー表示用フラグを設定する
            if(empty($postParams['post-title'])){
                $postErrorFlg = true;
            }else{
                $postTitle = $postParams['post-title'];
            }

            if(empty($postParams['post-tag'])){
                $postErrorFlg = true;
            }else{
                $postTag = $postParams['post-tag'];
            }

            if(empty($postParams['post-content'])){
                $postErrorFlg = true;
            }else{
                $postContent = $postParams['post-content'];
            }

            // 記事投稿用の連想配列を作成する
            $articleData = array();

            // 記事を投稿する
            $result = postArticleJson($postTitle, $postTag, $postContent);

            if(!$result){
                $postErrorFlg = true;
            }

        }

        // 画面の描画
        $this->render(
            'postArticle',
            [
                'currentContent' => 'POST',
                'pageTitle' => 'Post Article',
                'postTitle' => $postTitle,
                'postErrorFlg' => $postErrorFlg
            ]
        );
    }
}
