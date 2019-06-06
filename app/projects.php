<?php


class ProjectsRequest {

    public function __construct($_db) {
        // Get PDO
        $this->db = $_db;

        // Request
        $this->allProjects = $this->getProjects();
    }

    public function getProjects() {
        // Look for login in DB
        $this->prepare = $this->db->prepare('
        SELECT * from users
        WHERE login = :login
        ');
        $this->result = $this->prepare->execute();

        return $this->prepare->fetchAll();
    }
}

// "
// INSERT INTO 
//     projects (name, content)
// VALUES 
//     ("Bob", "Bob la fête")
// "