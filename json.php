<?php

include "readdb.php";

$return_arr = array();

$query = "SELECT * FROM cust ORDER BY ID";

$result = mysqli_query($mysqli,$query);

while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $name = $row['name'];

    $return_arr[] = array("id" => $id,
                    "nama" => $name);
    }

// Encoding array in JSON format

echo json_encode($wadidaw);

