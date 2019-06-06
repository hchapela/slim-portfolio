<?php


class AdminAuthentification {

    public function __construct($_db) {
        // Get PDO
        $this->db = $_db;
        // Save error or success messages
        $this->messages = [
            'error' => [],
            'success' => [],
        ];
        // set authentification to false by default

        // Form sent
        if(!empty($_POST)) {
            $this->checkValidity();
        }
        // Form not sent
        else {
            $_POST['login'] = '';
            $_POST['password'] = '';
        }
    }

    public function checkValidity() {
        // Get variables
        $login = trim($_POST['login']);
        $password = $_POST['password'];

        // Handle errors
        if(empty($login)) {
            $this->messages['error'][] = 'Missing username';
        }
        if(empty($password)) {
            $this->messages['error'][] = 'Missing password';
        }

        // Success
        if(empty($this->messages['error']))
        {
            // Look for login in DB
            $prepare = $this->db->prepare('
                SELECT * from users
                WHERE login = :login
            ');
            $prepare->bindValue('login', $login);
            $result = $prepare->execute();

            $result = $prepare->fetch();

            // Exit if SQL request empty
            if(empty($result)) {
                $this->failLogin();
            }

            // Check if password are the same
            else if(password_verify($_POST['password'], $result->password)) {
                $this->successLogin($login);
            }
            else {
                $this->failLogin();
            }

        }
        
    }

    public function successLogin($_login) {
        $this->state = $_login;
        $this->messages['success'][] = 'Successfully connected';
    }

    public function failLogin() {
        $this->messages['error'][] = 'Wrong password';
    }
}