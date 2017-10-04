<?php require('logic.php');?>

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
    <h5>Specify your inputs and operation</h5>
    <br><br>

    <form method='GET' action='index.php'>

        <!-- display first input box, retaining any valid input value, sanitized of course -->
        <label>Input 1:
            <input type='text' name='input1' <?php if (isset($_GET['input1']) && is_numeric($_GET['input1'])) echo "value=" . sanitize($_GET['input1'])?>>
        </label>

        <!-- display operation dropdown -->
        <select name='operation' id='operation'>
            <option value='choose'<?php if ($operation == 'choose') echo 'SELECTED'?>>choose</option>
            <option value='+' <?php if ($operation == '+') echo 'SELECTED'?>>+</option>
            <option value='-' <?php if ($operation == '-') echo 'SELECTED'?>>-</option>
            <option value='*' <?php if ($operation == '*') echo 'SELECTED'?>>*</option>
            <option value='/' <?php if ($operation == '/') echo 'SELECTED'?>>/</option>
         </select>

        <!-- display second input box, retaining any valid input value, sanitized of course -->
        <label>Input 2:
            <input type='text' name='input2' <?php if (isset($_GET['input2']) && is_numeric($_GET['input2'])) echo "value=" . sanitize($_GET['input2'])?>>
        </label>
        <br><br>

        <!-- display decimals checkbox -->
        <fieldset class='checkboxes'>
            <label><input type='checkbox' name='decimals' value='on' <?php if($form->isChosen('decimals')) echo 'CHECKED'?>> Show decimals in answer?</label>
        </fieldset>
        <br><br>

        <!-- display submit button with value of 'Calculate' -->
        <input type='submit' value='Calculate'>
        <br><br>

        <!-- display either alert/error or the result -->
        <?php if (!isset($results)) : ?>
            <?php if (count($errors) > 0) : ?>
               <div class='alert alert-danger'>
                        <?php foreach ($errors as $error) :?>
                            <?=$error?><br>
                        <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class='alert alert-info'>
                Answer is <?=$results?>.
            </div>
        <?php endif; ?>
    </form>

</body>
</html>