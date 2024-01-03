<?php
include("crud.php");

$crud = new crud();

$query = "SELECT * FROM angellist ORDER BY id DESC";


$result = $crud->getData($query);

if ($result == True) {
    echo "The query is  working!";
} else {
    echo "The query is not working!";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations in php</title>
</head>

<body>
    <a href="add.html">Add New Data</a><br><br><br>

    <table width='80%' border=0>

        <tr bgcolor='#CCCCCC'>
            <td>Id</td>
            <td>productName</td>
            <td>founder</td>
            <td>productOrigin</td>
            <td>fakeEmail</td>
            <td>Actions</td>
        </tr>

        <?php
        foreach ($result as $key => $data) {
            echo "<tr>";
            echo "<td>" . $data['id'] . "</td>";
            echo "<td>" . $data['productName'] . "</td>";
            echo "<td>" . $data['founder'] . "</td>";
            echo "<td>" . $data['productOrigin'] . "</td>";
            echo "<td>" . $data['fakeEmail'] . "</td>";
            echo "<td><a href=\"edit.php?id=$data[id]\">Edit</a> | <a href=\"delete.php?id=$data[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
            echo "</tr>";
        }
        ?>
        <table>
</body>

</html>