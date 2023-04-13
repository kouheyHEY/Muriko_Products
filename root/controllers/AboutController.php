<?php

class AboutController extends BaseController
{
    public function index($params)
    {
        $this->loadModel('AboutModel');
        $this->render('about', $this->model->getAbout());
    }
}
?>