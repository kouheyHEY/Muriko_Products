<?php
class ProductController extends BaseController
{
    public function show($category, $id = null)
    {
        $this->loadModel('ProductModel');
        $products = $this->model->getProducts($category, $id);
        $this->render('product', ['products' => $products]);
    }
}

?>