<?php

class SigninController extends BaseController
{
    public function index($params)
    {
        // モデルを取得
        $this->loadModel('SigninModel');
        $exParams = $this->model->getSignin();
        // 現在の表示コンテンツを設定
        $exParams['currentContent'] = 'SIGN IN';
        // 画面の描画
        $this->render('signin', array_merge($exParams, $params));
    }
}
?>