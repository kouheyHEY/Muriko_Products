<?php

class BaseView
{

    protected $view_path;

    public function __construct($view_path = 'views/')
    {
        $this->view_path = $view_path;
    }

    public function render($template, $params = [])
    {
        extract($params);
        ob_start();
        include $this->view_path . $template . '.php';
        $content = ob_get_clean();
        include $this->view_path . 'layout.php';
    }

}
?>