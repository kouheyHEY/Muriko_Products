<?php
class ArticleController extends BaseController
{
    public function show($service, $id = null)
    {
        $this->loadModel('ArticleModel');
        $articles = $this->model->getArticles($service, $id);
        $this->render('article', ['articles' => $articles]);
    }
}

?>