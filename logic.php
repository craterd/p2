<?php
require('helpers.php');

$returnFlag = false;  // signal a return if inputs not valid

// get the desired operation and validate
$operation = 'choose';
if (isset($_GET['operation'])) {
    $operation = $_GET['operation'];
    if ($operation == 'choose') {
        $alertType = 'alert-danger';
        $results = 'Please choose an operation.';
        $returnFlag = true;
    } 
}

// validate numerical inputs
if (!isset($_GET['Input1']) || !is_numeric($_GET['Input1']) || !isset($_GET['Input2']) || !is_numeric($_GET['Input2'])) {
    $alertType = 'alert-danger';
    $results = 'Both inputs must be numbers.';  
    $returnFlag = true;
}

// store value of decimals checkbox
if (!isset($_GET['decimals'])) {
    $cb_value = 'off';
} else {
    $cb_value = 'on';
}

// if any invalid input, return
if ($returnFlag) { return; }

// now do the math and signal an info alert with the answer
$input1 = (float) $_GET['Input1'];
$input2 = (float) $_GET['Input2'];
$alertType = 'alert-info';

if (!isset($_GET['decimals'])) {
    if ($operation == '+') {
        $results = "Answer is " . round($input1 + $input2) . ".";
    } else if ($operation == '-') {
        $results = "Answer is " . round($input1 - $input2) . ".";
    } else if ($operation == "*") {
        $results = "Answer is " . round($input1 * $input2) . ".";
    } else {
        $results = "Answer is " . round($input1 / $input2) . ".";
    }
} else {
    if ($operation == '+') {
        $results = "Answer is " . ($input1 + $input2) . ".";
    } else if ($operation == '-') {
        $results = "Answer is " . ($input1 - $input2) . ".";
    } else if ($operation == "*") {
        $results = "Answer is " . ($input1 * $input2) . ".";
    } else {
        $results = "Answer is " . ($input1 / $input2) . ".";
    }
}