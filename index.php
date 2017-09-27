<?php require('logic.php');

$quotes = [
    'In theory there is no difference between theory and practice. --Yogi Berra',
    'Freedom is never more than one generation away from extinction. --Ronald Reagan',
    'Do unto others as you would have them do unto you. --Jesus Christ',
    'Ask not what your country can do for you, but what you can do for your country. --John F. Kennedy',
    'Whenever I\'m about to do something, I think, Would an idiot do that? And if they would, I do not do that thing. --Dwight Schrute'
];

$choice = array_rand($quotes, 1);

?>

<!DOCTYPE html>
<html>
<head>
    <title>DWA Fall 2017 Project 2, by Dave Crater</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>A Basic Calculator</h1>
    <h5>Specify your inputs and operation
    <br><br><br><br></h5>
    <form method='GET' action='logic.php'>
        <label>Input 1:
            <input type='text' name='Input1'>
        </label>

        <select name='operation' id='operation'>
            <option value='choose'></option>
            <option value='+' <?php if ($operation == '+') echo 'SELECTED'?>>+</option>
            <option value='-' <?php if ($operation == '-') echo 'SELECTED'?>>-</option>
            <option value='*' <?php if ($operation == '*') echo 'SELECTED'?>>*</option>
            <option value='/' <?php if ($operation == '/') echo 'SELECTED'?>>/</option>
         </select>

         <?php if ($_GET) : ?>
             <div class="alert <?=$alertType?>" role="alert">
                 <?=$results?>
             </div>
         <?php endif; ?>

        <label>Input 2:
            <input type='text' name='Input2'>
        </label>
        <br><br>
        <fieldset class='checkboxes'>
            <label><input type='checkbox' name='decimals[]' value='on' <?php if (strstr($results, 'on')) echo 'CHECKED'?>> Show decimals in answer?</label>
        </fieldset>

        <br><br>
        <input type='submit' value='Calculate'>
    </form>

</body>
</html>
