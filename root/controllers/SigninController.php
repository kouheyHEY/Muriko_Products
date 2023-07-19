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
        

        // エラー情報
        $exParams['errMsgList'] = array(
            'userName' => '',
            'password' => ''
        );

        // 画面の描画
        $this->render('signin', array_merge($exParams, $params));
    }

    public function signin($params)
    {
        // モデルを取得
        $this->loadModel('SigninModel');
        $exParams = $this->model->getSignin();

        $signinSuccess = true;

        // 入力値
        $userName = $params[count($params) - 1]['user-name'];
        $password = $params[count($params) - 1]['password'];

        // エラー情報
        $errMsgList = array();
        
        // ユーザ名チェック
        if(empty($userName)){
            array_push($errMsgList, 'userName is required item.');
            $signinSuccess = false;
        }
        
        //　パスワードチェック
        if(empty($password)){
            array_push($errMsgList, 'password is required item.');
            $signinSuccess = false;
        }

        // チェックロジックの実行
        if($signinSuccess){
            $signinSuccess = checkSignin($userName, $password, $errMsgList);
        }

        if($signinSuccess){

            // 初期ページにリダイレクト
            header('Location: /about');

        }else{            
            // 画面の描画（ログイン失敗）
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
}
?>