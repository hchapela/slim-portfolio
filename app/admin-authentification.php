<?php


class AdminAuthentification {

    public function __construct($_db) {
        // Get PDO
        $this->db = $_db;
        // Save error or success messages
        echo '<pre>';
        print_r("working");
        echo '</pre>';

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
            $messages['error'][] = 'Missing username';
        }
        if(empty($password)) {
            $messages['error'][] = 'Missing password';
        }

        // Success
        if(empty($messages['error']))
        {
            // Look for login in DB
            $prepare = $this->db->prepare('
                SELECT * from users
                WHERE login = ":login"
            ');
            $prepare->bindValue('login', $login);

            $result = $prepare->execute();

            echo '<pre>';
            print_r($result);
            echo '</pre>';

            echo '<pre>';
            print_r($_POST);
            echo '</pre>';

            $messages['success'][] = 'Successfully connected';

            $_POST['login'] = '';
            $_POST['password'] = '';
        }
        echo '<pre>';
        print_r($messages);
        echo '</pre>';
    }
}