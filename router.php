<?php


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
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/projects' => 'controllers/projects.php',
    '/contact' => 'controllers/contact.php'
];

function routeToController($uri, $routes){
    // check if the key in the array exists in the uri
if (array_key_exists($uri, $routes)){
    require $routes[$uri];
} else {
    abort();
    
};
}
// the function looks for the code that corresponds the http response status and dispalys that view if it exists
// however, the default is set to 404 ie if the error is 422, it will override 404 then display the corresponding view
function abort($code = 404){
    http_response_code($code);
    require "views/{$code}.php";
    die();
};

routeToController($uri, $routes);