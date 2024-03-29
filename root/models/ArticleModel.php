<?php
// ArticleModel.php

class ArticleModel extends BaseModel
{
    public function getArticleById($service, $id)
    {
        $filePath = 'data/article/' . strtoupper($service) . '/' . $id . '.json';
        $data = $this->getData($filePath);
        return $data;

    }

    public function getArticlesByService($service)
    {
        $data = ConfigArticle::getArticleData($service);
        return $data;
    }
}
?>