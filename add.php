<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php

    include "crud.php";
    include "validation.php";

    $crud = new crud();
    $validation = new validation();


    if (isset($_POST['Submit'])) {
        $productName = $crud->escape_string($_POST['productName']);
        $founder = $crud->escape_string($_POST['founder']);
        $productOrigin = $crud->escape_string($_POST['productOrigin']);
        $fakeEmail = $crud->escape_string($_POST['fakeEmail']);

        $msg = $validation->is_empty_value('$_POST', array('name', 'productName', 'founder', 'productOrigin'));
        $check_email = $validation->is_valid_email($_POST['fakeEmail']);


        if (!$check_email) {
            echo 'Please provide proper email.';
        } else {

            $result = $crud->execute("INSERT INTO angellist (productName, founder, productOrigin, fakeEmail) VALUES ('$productName', '$founder', '$productOrigin', '$fakeEmail');");
            if ($result == True) {

                echo "<font color='green'>Data added successfully.";
                header("Location:index.php");
            } 
        }

    }


    ?>
</body>

</html>