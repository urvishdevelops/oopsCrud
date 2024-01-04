<?php
include "crud.php";
include "validation.php";

$crud = new crud();
$validation = new validation();


if (isset($_POST['update'])) {
    $id = $crud->escape_string($_POST['id']);
    $productName = $_POST['productName'];
    $founder = $crud->escape_string($_POST['founder']);
    $productOrigin = $crud->escape_string($_POST['productOrigin']);
    $fakeEmail = $validation->is_valid_email($_POST['fakeEmail']);



    if (!$fakeEmail) {
        echo "Please provide an valid email";
    } else {
        $result = $crud->execute("UPDATE angellist SET productName='$productName', founder='$founder', productOrigin='$productOrigin', fakeEmail='$fakeEmail' where id='$id';");

        echo "We are here";
        header("Location: index.php");


        if ($result == True) {
            echo "Query executed";
        } else {
            echo "Fail to execute query";
        }
        echo "here";
    }
}
?>