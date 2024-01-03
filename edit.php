<?php

include "crud.php";

$crud = new crud();

$id = $crud->escape_string($_GET['id']);

$result = $crud->getData("SELECT * FROM angellist WHERE id=$id");


foreach ($result as $data) {
    $productName = $data['productName'];
    $founder = $data['founder'];
    $productOrigin = $data['productOrigin'];
    $fakeEmail = $data['fakeEmail'];
}
?>

<html>

<head>
    <title>Edit Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br /><br />

    <form name="form1" method="post" action="editaction.php">
        <table border="0">
            <tr>
                <td>productName</td>
                <td><input type="text" name="name" value="<?php echo $productName; ?>"></td>
            </tr>
            <tr>
                <td>founder</td>
                <td><input type="text" name="age" value="<?php echo $founder; ?>"></td>
            </tr>
            <tr>
                <td>productOrigin</td>
                <td><input type="text" name="email" value="<?php echo $productOrigin; ?>"></td>
            </tr>
            <tr>
                <td>fakeEmail</td>
                <td><input type="text" name="email" value="<?php echo $fakeEmail; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>