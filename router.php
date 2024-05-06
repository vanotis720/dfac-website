<?php

// Define routes
$routes = [
    '/' => 'index.html',
    '/services/{name}' => 'service.php',
];

// Get current URI
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?...) and trailing slashes
$uri = strtok($uri, '?');
$uri = rtrim($uri, '/');

// Default route
$route = null;

// Match route
foreach ($routes as $pattern => $file) {
    // Convert route pattern to regex
    $pattern = str_replace('/', '\/', $pattern);
    $pattern = preg_replace('/\{[^\}]+\}/', '[^\/]+', $pattern);
    $pattern = '/^' . $pattern . '$/';

    if (preg_match($pattern, $uri)) {
        $route = $file;
        break;
    }
}

// If route found, include corresponding file
if ($route !== null) {
    include $route;
} else {
    // Handle 404 - Not Found
    http_response_code(404);
    echo '<h1>404 - Not Found</h1>';
}
