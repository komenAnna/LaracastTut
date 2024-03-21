<?php

require "functions.php";

// get the current URI
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// if ($uri === '/'){
//     require 'controllers/index.php';
// } else if ($uri === '/about') {
//     require 'controllers/about.php';
// } else if ($uri === '/projects') {
//     require 'controllers/projects.php';
// } else if ($uri === '/contact') {
//     require 'controllers/contact.php';
// };
// refactor above to an array to make it easier to add new routes in the future
$routes = [
    '/' =>  require 'controllers/index.php',
    '/about' =>  require 'controllers/about.php',
    '/projects' =>  require 'controllers/projects.php',
    '/contact' =>  require 'controllers/contact.php',
];
// check if the key in the array exists in the uri
if (array_key_exists($uri, $routes)){
    require $routes[$uri];
} else {
    // if not dispaly a 404 page
    http_response_code(404);
    require 'views/404.php';
};