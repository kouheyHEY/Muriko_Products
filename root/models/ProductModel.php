<?php

class ProductModel extends BaseModel
{
    public function getProductById($category, $id)
    {
        $filePath = 'data/product/' . strtoupper($category) . '/' . $id . '.json';
        $data = $this->getData($filePath);
        return $data;

    }

    public function getProductsByCategory($category)
    {
        $data = $this->getData('data/product/product_list.json');
        return $data[strtoupper($category)];
    }
}

?>