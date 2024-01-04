<?php

include "crud.php";

$crud = new crud();

$id = $crud->escape_string($_GET['id']);

$result = $crud->getData("SELECT * FROM angellist WHERE id=$id");



foreach ($result as $data=>$value) {
    $productName = $value['productName'];
    $founder = $value['founder'];
    $productOrigin = $value['productOrigin'];
    $fakeEmail = $value['fakeEmail'];
}
?>

<head>
    <title>Add Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color:rgb(20, 28, 54); color: darkgoldenrod;">
    
    <br /><br />
    <a href="index.php"class="btn btn-success mt-4 ml-5" style="margin-left: 10%;" > <-- Home</a>
    <div class="container justify-content-center mt-5" style="margin-top: 05%">

    <form name="form1" method="post" action="editaction.php">
        <table class="table" >
            <tr>
            <td>Product Name</td>
                <td><input type="text" name="productName" style="color:black" value="<?php echo $productName; ?>"></td>
            </tr>
            <tr>
            <td>Founder</td>
                <td><input type="text" name="founder" style="color:black" value="<?php echo $founder; ?>"></td>
            </tr>
            <tr>
            <td>Product Origin</td>
                <td><input type="text" name="productOrigin" style="color:black" value="<?php echo $productOrigin; ?>"></td>
            </tr>
            <tr>
            <td>Fake Email</td>
                <td><input type="text" name="fakeEmail" style="color:black" value="<?php echo $fakeEmail; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update" style="background-color: #4cae4c; padding:2px 15px 2px 15px ; border-radius: 2px; color: rgb(255, 255, 255);"></td>
            </tr>
        </table>
        </form>
        </div>
</body>

</html>