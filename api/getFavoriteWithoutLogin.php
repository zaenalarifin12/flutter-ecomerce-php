<?php

include_once("../db/db.php");

$response = [];

$deviceInfo = $_GET["deviceInfo"];

$query = mysqli_query($con, "SELECT b.* FROM favoriteWithoutLogin a left join 
product b on a.idProduct = b.id WHERE a.deviceID='$deviceInfo'");


while($a = mysqli_fetch_array($query)){

    $key["id"]              = $a["id"];
    $key["productName"]     = $a["productName"];
    $key["sellingPrice"]    = (int)$a["sellingPrice"];
    $key["createdDate"]     = $a["createdDate"];
    $key["cover"]           = $a["cover"];
    $key["status"]          = $a["status"];
    $key["description"]     = $a["description"];

    array_push($response, $key);
}

echo json_encode($response);


?>