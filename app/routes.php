<?php

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