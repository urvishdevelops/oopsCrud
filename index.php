<?php
include "crud.php";
include 'pagination.php';

$crud = new crud();


//pagination
$totalItemsQuery = $crud->getData("SELECT COUNT(id) AS total FROM angellist");

$itemsPerPage = 4;

foreach ($totalItemsQuery as $key => $value) {
    $row_count = $value['total'];
}


$totalItems = $row_count; // Total number of items

$pagination = new Pagination($totalItems, $itemsPerPage);



$offset = $pagination->getOffset();
$currentpage = $pagination->getCurrentPage();
$totalPages = $pagination->getTotalPages();



// aahiya sudhi

$query = "SELECT * FROM angellist LIMIT $offset, $itemsPerPage";


$result = $crud->getData($query);


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations in php</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color:rgb(20, 28, 54); color: white;">

    <div class="container justify-content-center mt-5" style="margin-top: 05%">
        <table class="table table-striped table-dark">
            <thead>

                <tr class="text-primary">
                    <td>Id</td>
                    <td>Product Name</td>
                    <td>Founder</td>
                    <td>Product Origin</td>
                    <td>Fake Email</td>
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
                    echo "<td><a href=\"edit.php?id=$data[id]\" class=\"btn btn-warning\">Edit</a> | <a href=\"delete.php?id=$data[id]\" class=\"btn btn-danger\"onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                    echo "</tr>";
                }
                ?>
                <table>
                    <?php
                    echo "<div class='pagination'>";
                    if ($currentpage > 1) {
                        echo "<a href='?page=" . ($currentpage - 1) . "' class='btn'>Previous</a>";
                    }
                    for ($page = 1; $page <= $totalPages; $page++) {
                        echo "<a href='?page=$page' class='btn" .
                            ($currentpage == $page ? " active" : "") . "'>$page</a> ";
                    }
                    if ($currentpage < $totalPages) {
                        echo "<a href='?page=" . ($currentpage + 1) . "' class='btn'>Next</a>";
                    }
                    echo "</div>"; ?>
    </div>
    </div>

    <div>
        <span>
            <h6 class="text-primary">Add data from here: </h6><a href="add.html" class="btn btn-success">Add New
                Data</a>
    </div><br><br><br>
</body>

</html>