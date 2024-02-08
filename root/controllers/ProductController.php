<?php
class ProductController extends BaseController
{
    public function detail($params)
    {
        // モデルを取得
        $this->loadModel('ProductModel');
        // カテゴリ
        $category = $params[2];
        // プロダクトID
        $productId = $params[3];

        // プロダクト取得
        $productData = $this->model->getProductById($category, $productId);
        
        // OGPの設定
        $_SESSION['OG_TITLE'] = $productData['title'];
        $_SESSION['OG_DESCRIPTION'] = $productData['exp'];

        // 画面の描画
        $this->render(
            'product',
            [
                'product' => $productData,
                'currentCategory' => strtolower($category),
                'currentContent' => 'PRODUCTS'
            ]
        );
    }

    public function index($params)
    {
        // モデルを取得
        $this->loadModel('ProductModel');
        // カテゴリが設定されていない場合
        if (!isset($params[2])) {
            // カテゴリを初期化する
            $category = Config::getMasterData('CATEGORIES')[0];
        } else {
            $category = $params[2];
        }

        // プロダクト一覧取得
        $productList = $this->model->getProductsByCategory($category);
        
        // OGPの設定
        $_SESSION['OG_TITLE'] = 'PRODUCTS';

        // 画面の描画
        $this->render(
            'productList',
            [
                'productList' => $productList,
                'currentCategory' => strtolower($category),
                'currentContent' => 'PRODUCTS'
            ]
        );

    }
}

?>