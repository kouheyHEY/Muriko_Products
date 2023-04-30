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
        if ($service === 'zenn') {
            $data = ConfigArticle::getArticleData('zenn');
            return $data;
        } else {
            $data = $this->getData('data/article/article_list.json');
            return $data[strtoupper($service)];
        }
    }
}
?>