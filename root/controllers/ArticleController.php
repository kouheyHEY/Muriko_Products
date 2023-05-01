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

        // 記事サービスを設定する
        $service = strtolower(Config::getMasterData('SERVICES')[0]);
        if (isset($params[2])) {
            $service = $params[2];
        }
        // 現在のページを取得
        $currentPage = 1;
        if (isset($params[3])) {
            $currentPage = $params[3];
        }

        // 記事一覧取得
        $articleListTmp = $this->model->getArticlesByService($service);

        // サービスが「zenn」の場合、かつ記事一覧が取得されていない場合
        if ($service === 'zenn' && !isset($articleListTmp)) {
            // 記事一覧取得用のphpを実行
            $this->render(
                'getArticleList',
                [
                    'currentService' => strtolower($service),
                    'currentContent' => 'NOTES',
                ]
            );
        } else {
            // 記事数
            $totalCount = count($articleListTmp);

            // ページ番号に応じて表示する記事の範囲を決定する
            $offset = ($currentPage - 1) * Config::getMasterData("CONTENT_PER_PAGE");
            $limit = Config::getMasterData("CONTENT_PER_PAGE");
            $articleList = array_slice($articleListTmp, $offset, $limit);

            // 画面の描画
            $this->render(
                'articleList',
                [
                    'articleList' => $articleList,
                    'currentService' => strtolower($service),
                    'currentContent' => 'NOTES',
                    'currentPage' => $currentPage,
                    'totalCount' => $totalCount
                ]
            );
        }
    }
}

?>