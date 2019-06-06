<?php


class ExperiencesRequest {

    public function __construct($_db) {
        // Get PDO
        $this->db = $_db;

        // Request
        $this->allExperiences = $this->getExperiences();
    }

    public function getExperiences() {
        // Look for login in DB
        $this->prepare = $this->db->prepare('
        SELECT * from experiences
        ');
        $this->result = $this->prepare->execute();

        return $this->prepare->fetchAll();
    }
}

class ExperienceAdd {
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
            $this->insertExperience();
        }
        // Form not sent
        else {
            $_POST['login'] = '';
            $_POST['password'] = '';
        }
    }

    public function insertExperience() {
        // Get variables
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        // Handle errors
        if(empty($title)) {
            $this->messages['error'][] = 'Missing title';
        }
        if(empty($content)) {
            $this->messages['error'][] = 'Missing content';
        }

        // Execute if success
        if(empty($this->messages['error']))
        {
            // Look for login in DB
            $prepare = $this->db->prepare('
            INSERT INTO 
                experiences (title, content)
            VALUES
                (:title , :content)
            ');
            $prepare->bindValue('title', $title);
            $prepare->bindValue('content', $content);
            $prepare->execute();
        }
    }
}