<?php

require 'admin-authentification.php';

// Home
$app
    ->get(
        '/',
        function($request, $response)
        {
            // View data
            $viewData = [];

            return $this->view->render($response, 'pages/home.twig', $viewData);
        }
    )
    ->setName('home')
;

// Categories
$app
    ->get(
        '/categories',
        function($request, $response)
        {
            // Fetch categories
            $query = $this->db->query('SELECT * FROM categories');
            $categories = $query->fetchAll();

            // View data
            $viewData = [];
            $viewData['categories'] = $categories;

            return $this->view->render($response, 'pages/categories.twig', $viewData);
        }
    )
    ->setName('categories')
;

// Admin
$app
    ->get(
        '/admin',
        function($request, $response)
        {
            $viewData = [];
            return $this->view->render($response, 'pages/admin.twig', $viewData);
        }
    )
    ->setName('admin')
;

$app
    ->post(
        '/admin',
        function($request, $response)
        {
            session_start();
            $viewData = [];
            $auth = new AdminAuthentification($this->db);
            // Check if session is authentified
            if(isset($auth->state)) {
                // redirect to another page
                // session with ok
            } else {
                return $this->view->render($response, 'pages/admin.twig', $viewData);
            }
        }
    )
;

// Dashboard
$app
    ->get(
        '/dashboard',
        function($request, $response)
        {
            // View data
            $viewData = [];

            return $this->view->render($response, 'pages/dashboard.twig', $viewData);
        }
    )
    ->setName('dashboard')
;

// About
$app
    ->get(
        '/about',
        function($request, $response)
        {
            // View data
            $viewData = [];
            return $this->view->render($response, 'pages/about.twig', $viewData);
        }
    )
    ->setName('about')
;

// Projects
$app
    ->get(
        '/projects',
        function($request, $response)
        {
            // View data
            $viewData = [];
            return $this->view->render($response, 'pages/projects.twig', $viewData);
        }
    )
    ->setName('projects')
;