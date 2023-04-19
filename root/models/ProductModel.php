<?php

class ProductModel extends BaseModel
{
    public function getProductById($category, $id)
    {
        $data = $this->getData();
        foreach ($data['products'] as $product) {
            if ($product['category'] == $category && $product['id'] == $id) {
                return $product;
            }
        }
        return null;
    }

    public function getProductsByCategory($category)
    {
        $data = $this->getData('data/product/product_list.json');
        return $data[strtoupper($category)];
    }
}

?>