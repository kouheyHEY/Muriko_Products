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
        
        // OGPの設定
        $_SESSION['OG_TITLE'] = 'ABOUT';
        $_SESSION['OG_DESCRIPTION'] = 'Murikoが制作したツールやゲームを紹介しています。';
        
        // 画面の描画
        $this->render('about', array_merge($exParams, $params));
    }
}
?>