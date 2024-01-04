<?php
include "crud.php";

$crud = new crud();

$id = $crud->escape_string($_GET['id']);

$result = $crud->delete('angellist', $id);

if ($result == True) {
    header("Location:index.php");

} else {
    echo "The query isn't working properly";
}
?>