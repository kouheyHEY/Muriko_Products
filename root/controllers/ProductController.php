<?php
class ProductController extends BaseController
{
    public function show($category, $id = null)
    {
        $this->loadModel('ProductModel');
        $products = $this->model->getProducts($category, $id);
        $this->render('product', ['products' => $products]);
    }

    public function index($params)
    {
        // モデルを取得
        $this->loadModel('ProductModel');
        $category = '';
        $modelParams = '';
        if (!isset($params[2])) {
            $category = Config::getMasterData('CATEGORIES')[0];
        } else {
            $category = $params[2];
        }
        $modelParams = $this->model->getProductsByCategory($category);
        // 現在の表示コンテンツを設定
        $modelParams['currentContent'] = 'PRODUCTS';
        // 画面の描画
        $this->render('product', $params);
    }
}

?>