<?php
class ArticleController extends BaseController
{
    public function detail($params)
    {
        // モデルを取得
        $this->loadModel('ArticleModel');
        // 記事サービス
        $service = $params[2];
        // 記事ID
        $articleId = $params[3];

        // 記事取得
        $articleData =
            $this->model->getProductById($service, $articleId);
        // 画面の描画
        $this->render(
            'article',
            [
                'article' => $articleData,
                'currentService' => strtolower($service),
                'currentContent' => 'NOTES'
            ]
        );
    }

    public function index($params)
    {
        // モデルを取得
        $this->loadModel('ArticleModel');
        // 記事サービスが設定されていない場合
        $service = '';
        if (!isset($params[2])) {
            // 記事サービスを初期化する
            $service = Config::getMasterData('SERVICES')[0];
        } else {
            $service = $params[2];
        }

        // 記事一覧取得
        $articleList = $this->model->getArticlesByService($service);
        // 画面の描画
        $this->render(
            'articleList',
            [
                'articleList' => $articleList,
                'currentService' => strtolower($service),
                'currentContent' => 'NOTES'
            ]
        );

    }
}

?>