<?php

class ProjectModel
{

    private $jsonFile;
    private $projects;

    public function __construct($jsonFile)
    {
        $this->jsonFile = $jsonFile;
        $this->projects = $this->loadProjects();
    }

    private function loadProjects()
    {
        $json = file_get_contents($this->jsonFile);
        return json_decode($json, true);
    }

    public function getProjects()
    {
        return $this->projects;
    }

    public function getProjectById($id)
    {
        foreach ($this->projects as $project) {
            if ($project['id'] == $id) {
                return $project;
            }
        }
        return null;
    }

}

?>