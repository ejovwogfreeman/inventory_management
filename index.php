<?php

// index.php

// Start output buffering
ob_start();

// Get the requested URI
$requestUri = $_SERVER['REQUEST_URI'];

// Remove query string from the URI
$requestUri = strtok($requestUri, '?');

// Define the base path
$basePath = '/inventory_management';

// Remove the base path from the request URI
$requestUri = str_replace($basePath, '', $requestUri);

// Ensure the requestUri starts with a slash
if ($requestUri === '') {
    $requestUri = '/';
}

// Simple routing logic
switch ($requestUri) {
    case '/':
        require 'views/dashboard.php';
        break;
    case '/customers':
        require 'views/customers.php';
        break;
    case '/suppliers':
        require 'views/suppliers.php';
        break;
    case '/categories':
        require 'views/categories.php';
        break;
    case '/products':
        require 'views/products.php';
        break;
    case '/purchase':
        require 'views/purchase.php';
        break;
    case '/sales':
        require 'views/sales.php';
        break;
    case '/expenses':
        require 'views/expenses.php';
        break;
    case '/staffs':
        require 'views/staffs.php';
        break;
    case '/reports':
        require 'views/reports.php';
        break;
    case '/change_password':
        require 'views/change_password.php';
        break;
    case '/profile':
        require 'views/profile.php';
        break;
    case '/logout':
        require 'views/logout.php';
        break;
    default:
        require 'views/404.php';
        break;
}

// End output buffering and flush output
ob_end_flush();
