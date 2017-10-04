<?php
require('helpers.php');
require('Form.php');

$form = new DWA\Form($_GET);

// operation always needs a value for display page
if (isset($_GET['operation']))
{
    $operation = $_GET['operation'];
} else {
    $operation = 'choose';
}

// validate form inputs
if ($form->isSubmitted()) 
{
    $errors = $form->validate(
        [
            'operation' => 'isOperation',
            'input1' => 'required|numeric',
            'input2' => 'required|numeric',
        ]
    );
}

// if no errors, do the math
if ($form->isSubmitted() && count($errors) == 0)
{
    $input1 = (float) sanitize($_GET['input1']);
    $input2 = (float) sanitize($_GET['input2']);

    if ($operation == '+') {
        $results = $input1 + $input2;
    } elseif ($operation == '-') {
        $results = $input1 - $input2;
    } elseif ($operation == "*") {
        $results = $input1 * $input2;
    } else {
        $results = $input1 / $input2;
    }

    if (!$form->isChosen('decimals')) {
        $results = round($results);
    }
}