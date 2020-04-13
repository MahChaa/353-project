<?php
include(__DIR__ . '/Router.php');

/* @var string[] $tables */
$tables = array();

require_once(__DIR__ . '/ORM/Data/Patient.php');
$tables[] = Patient::constructRoutes();

require_once(__DIR__ . '/ORM/Data/Clinic.php');
$tables[] = Clinic::constructRoutes();

require_once(__DIR__ . '/ORM/Data/Dentist.php');
$tables[] = Dentist::constructRoutes();

require_once(__DIR__ . '/ORM/Data/Receptionist.php');
$tables[] = Receptionist::constructRoutes();

require_once(__DIR__ . '/ORM/Data/Appointment.php');
$tables[] = Appointment::constructRoutes();

require_once(__DIR__ . '/ORM/Data/Treatment.php');
$tables[] = Treatment::constructRoutes();

require_once(__DIR__ . '/ORM/Data/Bill.php');
$tables[] = Bill::constructRoutes();

Router::add('/', function() use ($tables) {
    echo 'Welcome :-)<br><br>';

    foreach ($tables as $table) {
        $name = ucfirst($table);
        echo "<a href='/$table'>$name</a><br>";
    }
    echo '<br>';
    echo "<a href='/sql'>Send raw SQL statements</a><br>";
});

// Raw SQL route.
Router::add('/sql', function () {
    echo '<form method="post" action="">';
    echo '<label for="query">Raw SQL:</label><br>';
    echo '<textarea required id="query" name="query"></textarea>';
    echo '<br><input type="submit" name="submit" value="Submit"></form>';
});
Router::add('/sql', function () {
    global $database;

    $data = $_POST['query'];
    echo '<form method="post" action="">';
    echo '<label for="query">Raw SQL:</label><br>';
    echo "<textarea required id='query' name='query'>$data</textarea>";
    echo '<br><input type="submit" name="submit" value="Submit"></form><br><br>';

    echo $database->sendRawSQL($data);
}, "post");

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