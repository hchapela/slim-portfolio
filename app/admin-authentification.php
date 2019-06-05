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
            // Check if password are the same
            if($result->password == $_POST['password']) {
                $this->successLogin();
            }
            else {
                $this->failLogin();
            }

            // Reset login and password
            $_POST['login'] = '';
            $_POST['password'] = '';
        }
        
    }

    public function successLogin() {
        $_SESSION['authentification'] = "authentified";
        $this->messages['success'][] = 'Successfully connected';
    }

    public function failLogin() {
        $this->messages['error'][] = 'Wrong password';
    }
}