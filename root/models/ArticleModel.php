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
            // zenn以外のサービス用の記事取得ロジックを記載
            $data = $this->getData('data/article/article_list.json');
            return $data[strtoupper($service)];
        }
    }
}
?>