<?php

require 'admin-authentification.php';
require 'projects.php';
require 'experiences.php';

// Home
$app
    ->get(
        '/',
        function($request, $response)
        {
            // View data
            $viewData = [];
            $viewData['title'] = "Hugo. C";
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
            $viewData['title'] = "Hugo. C | Admin";
            // Redirect if session already logged
            if(isset($_SESSION['authentified'])) {
                return $response->withRedirect($this->router->pathFor('dashboard'));
            }
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
            $viewData = [];
            $auth = new AdminAuthentification($this->db);
            // Check if session is authentified
            if(isset($auth->state)) {
                // session with ok
                $_SESSION['authentified'] = $auth->state;
                // redirect to another page
                return $response->withRedirect($this->router->pathFor('dashboard'));
            } 
            // If not authentified
            else {
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
            // Get which user is logged
            $viewData['user'] = $_SESSION['authentified'];

            // Check if authentified
            if(isset($_SESSION['authentified'])) {
                return $this->view->render($response, 'pages/dashboard.twig', $viewData);
            }
            else {
                return $response->withRedirect($this->router->pathFor('admin'));
            }
        }
    )
    ->setName('dashboard')
;

$app
    ->post(
        '/dashboard',
        function($request, $response)
        {
            // View data
            $viewData = [];
            // Get which user is logged
            $viewData['user'] = $_SESSION['authentified'];

            // Add new experience
            $addExperience = new ExperienceAdd($this->db);

            // Reload Page
            return $response->withRedirect($this->router->pathFor('admin'));
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
            // Get experiences
            $experiences = new ExperiencesRequest($this->db);
            $viewData['experiences'] = $experiences->allExperiences;
            

            // Render
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
            // Get all projects
            $projects = new ProjectsRequest($this->db);

            $viewData['projects'] = $projects->allProjects;
            echo '<pre>';
            print_r($projects->allProjects);
            echo '</pre>';
            exit;
            return $this->view->render($response, 'pages/projects.twig', $viewData);
        }
    )
    ->setName('projects')
;