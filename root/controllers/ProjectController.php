<?php
    class ProjectController {
        
        private $projectModel;
        
        public function __construct($projectModel) {
            $this->projectModel = $projectModel;
        }
        
        public function index() {
            $projects = $this->projectModel->getProjects();
            include_once 'views/projects.php';
        }
        
        public function show($id) {
            $project = $this->projectModel->getProjectById($id);
            if ($project != null) {
                include_once 'views/project.php';
            } else {
                include_once 'views/errors/404.php';
            }
        }
        
        // 他のメソッド
    }

?>