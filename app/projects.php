<?php


class getProjects{

    public function __construct($_db) {
        // Get PDO
        $this->db = $_db;

        // Request
        $this->allProjects = $this->getProjects();
    }

    public function getProjects() {
        // Look for login in DB
        $this->prepare = $this->db->prepare('
        SELECT * from projects
        ');
        $this->result = $this->prepare->execute();

        return $this->prepare->fetchAll();
    }
}

class ProjectAdd {
    public function __construct($_db) {
        // get PDO
        $this->db = $_db;

        $this->checkValidity();
    }

    public function checkValidity() {
        // Save error or success messages
        $this->messages = [
            'error' => [],
            'success' => [],
        ];
        // set authentification to false by default

        // Form sent
        if(!empty($_POST)) {
            $this->insertProject();
        }
        // Form not sent
        else {
            $_POST['login'] = '';
            $_POST['password'] = '';
        }
    }

    public function insertProject() {
        // Get variables
        $project = trim($_POST['project']);
        $explainations = trim($_POST['explainations']);
        $link = trim($_POST['link']);
        $thumbnail = trim($_POST['thumbnail']);

        // Handle errors
        if(empty($project) ||
        empty($explainations) ||
        empty($link) ||
        empty($thumbnail)
        ) {
            $this->messages['error'][] = 'Missing details';
        }

        // Execute if success
        if(empty($this->messages['error']))
        {
            // Look for login in DB
            $prepare = $this->db->prepare('
            INSERT INTO 
                projects (project, explainations, link, thumbnail)
            VALUES
                (:project, :explainations, :link, :thumbnail)
            ');
            $prepare->bindValue('project', $project);
            $prepare->bindValue('explainations', $explainations);
            $prepare->bindValue('link', $link);
            $prepare->bindValue('thumbnail', $thumbnail);
            $prepare->execute();
        }
    }
}