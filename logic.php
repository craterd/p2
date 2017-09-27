<?php
require('helpers.php');

if ($_GET) {
    dump($_GET); # Output from logic, only for debugging purposes to see the contents of GET
}
$operation = 'choose';
if (isset($_GET['operation'])) {
    $operation = $_GET['operation'];
    if ($operation == 'choose') {
        $alertType = 'alert-danger';
        $results = 'Please choose an operation.';
    } else {
        $alertType = 'alert-info';
        $results = 'You chose '.$operation;
    }
}

if (!isset($_GET['decimals'])) {
    $results = 'No decimals to be displayed';
    $alertType = 'alert-danger';
} else {
    $results = 'Decimals to be displayed';
    $alertType = 'alert-info';
}