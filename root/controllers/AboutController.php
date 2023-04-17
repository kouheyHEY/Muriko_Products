<?php

class AboutController extends BaseController
{
    public function index($params)
    {
        // モデルを取得
        $this->loadModel('AboutModel');
        $exParams = $this->model->getAbout();
        // 現在の表示コンテンツを設定
        $exParams['currentContent'] = 'ABOUT';
        // 画面の描画
        $this->render('about', $exParams);
    }
}
?>