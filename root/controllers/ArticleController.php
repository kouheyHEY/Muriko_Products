<?php

// ロジック
require_once($_SERVER['DOCUMENT_ROOT'] . "/logics/GetArticleListLogic.php");
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

        // リストから特定のidの記事を検索し取得
        $articleIdx = array_search(
            $articleId, 
            array_column(
                ConfigArticle::getArticleData($service),
                'id'
            )
        );
        $articleData = ConfigArticle::getArticleData($service)[$articleIdx];

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

        // 記事一覧が取得されていない場合
        if (empty($articleListTmp)) {

            // サービスが「zenn」の場合
            if ($service === 'zenn') {

                // 記事一覧取得用のphpを実行
                $this->render(
                    'getArticleList',
                    [
                        'currentService' => strtolower($service),
                        'currentContent' => 'NOTES',
                    ]
                );

                return;
                
            // サービスが「muripro」の場合
            } else if ($service === 'muripro') {

                // 記事一覧取得用のロジックを実行
                $articleListTmp = getArticleListByService($service);

                // 取得した記事一覧をセッションに保存
                ConfigArticle::setArticleData(
                    $service,
                    $articleListTmp
                );
            }

        }

        // 記事数
        $totalCount = count($articleListTmp);

        // ページ番号に応じて表示する記事の範囲を決定する
        $offset = ($currentPage - 1) * Config::getMasterData("CONTENT_PER_PAGE");
        $limit = Config::getMasterData("CONTENT_PER_PAGE");
        $articleList = array_slice($articleListTmp, $offset, $limit);

        // 記事を一覧表示する際の情報を作成する
        $articleDispInfoList = array();

        foreach($articleList as $article) {
            $dispInfo = array();
            if ($service === "zenn"){
                
                // urlを設定
                $dispInfo["url"] = Config::getMasterData('SERVICE_URL')[strtoupper($service)] . $article['path'];
                
                // 投稿日時と最終更新日を取得
                $updTime = $article["body_updated_at"];
                $postTime = $article["published_at"];

                // 最終更新日を決定
                $dispInfo["lastUpdTime"] = $updTime ?? $postTime;
                $dispInfo["lastUpdTime"] = (new DateTime($dispInfo["lastUpdTime"]))->format('Y-m-d');

            }else{

                // urlを設定
                $dispInfo["url"] = "/article/muripro/" . $article["id"];
                
                // 最終更新日を設定
                $dispInfo["lastUpdTime"] = $article["updDate"];
            }

            array_push($articleDispInfoList, $dispInfo);
        }

        // 画面の描画
        $this->render(
            'articleList',
            [
                'articleList' => $articleList,
                'articleDispInfoList' => $articleDispInfoList,
                'currentService' => strtolower($service),
                'currentContent' => 'NOTES',
                'currentPage' => $currentPage,
                'totalCount' => $totalCount
            ]
        );

    }
}

?>