<?php
include(__DIR__ . '/Router.php');

require_once(__DIR__ . '/ORM/TestTable.php');
require_once(__DIR__ . '/ORM/ManyTable.php');

TestTable::constructRoutes();
ManyTable::constructRoutes();

Router::add('/', function() {
    echo 'Welcome :-)';
});

// Add a 404 not found route
Router::pathNotFound(function($path) {
    header('HTTP/1.0 404 Not Found');
    echo 'Error 404 :-(<br>';
    echo 'The requested path "'.$path.'" was not found!';
});

// Add a 405 method not allowed route
Router::methodNotAllowed(function($path, $method) {
    header('HTTP/1.0 405 Method Not Allowed');
    echo('Error 405 :-(<br>');
    echo('The requested path "' . $path . '" exists. But the request method "' . $method . '" is not allowed on this path!');
});

// Run the Router with the given Basepath
// If your script lives in the web root folder use a / or leave it empty
Router::run('/');

?>