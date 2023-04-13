<?php
// ArticleModel.php

class ArticleModel extends BaseModel
{
    public function getArticleById($service, $id)
    {
        $data = $this->getData();
        foreach ($data['articles'] as $article) {
            if ($article['service'] == $service && $article['id'] == $id) {
                return $article;
            }
        }
        return null;
    }

    public function getArticlesByService($service)
    {
        $articles = [];
        $data = $this->getData();
        foreach ($data['articles'] as $article) {
            if ($article['service'] == $service) {
                $articles[] = $article;
            }
        }
        return $articles;
    }
}
?>