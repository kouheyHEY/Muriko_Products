<?php

// ロジック
require_once($_SERVER['DOCUMENT_ROOT'] . "/logics/SigninLogic.php");

class SigninController extends BaseController
{
    public function index($params)
    {
        // モデルを取得
        $this->loadModel('SigninModel');
        $exParams = $this->model->getSignin();
        // 現在の表示コンテンツを設定
        $exParams['currentContent'] = 'SIGN IN';
        // タイトルを設定
        $exParams['contentTitle'] = "Sign in";
        // 画面の描画
        $this->render('signin', array_merge($exParams, $params));
    }

    public function signin($params)
    {
        // モデルを取得
        $this->loadModel('SigninModel');
        $exParams = $this->model->getSignin();

        // 入力値
        $userName = $params[count($params) - 1]['user-name'];
        $password = $params[count($params) - 1]['password'];
        // エラー情報
        $errMsgList = array(
            'userName' => '',
            'password' => ''
        );
        
        // ユーザ名チェック
        if(empty($errMsg['user-name']) && empty($userName)){
            $errMsgList['user-name'] = 'userName is required item.';
        }
        
        //　パスワードチェック
        if(empty($errMsgList['password']) && empty($password)){
            $errMsgList['password'] = 'password is required item.';
        }

        //

        // 画面の描画
        $this->render(
            'signin',
            [
                'currentContent' => 'SIGN IN',
                'contentTitle' => 'Sign in',
                'userName' => $userName,
                'password' => $password,
                'errMsgList' => $errMsgList
            ]
        );
    }
}
?>