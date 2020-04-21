<?php

include_once("../db/db.php");

$response = [];

$sql = mysqli_query($con, "SELECT * FROM category ORDER BY id ASC");

while($a = mysqli_fetch_assoc($sql)){

    $idCategory = $a["id"];
    $key["id"]              = $a["id"];
    $key["categoryName"]    = $a["categoryName"];
    $key["status"]          = $a["status"];
    $key["createdDate"]     = $a["createdDate"];

    $key["product"] = [];

    $queryProduct = mysqli_query($con, "SELECT * FROM product where idCategory='$idCategory'");
    while($b = mysqli_fetch_array($queryProduct)){

        $key["product"][] = [
            "id"            => $b["id"],
            "idCategory"    => $b["idCategory"],
            "productName"   => $b["productName"],
            "sellingPrice"  => (int)$b["sellingPrice"],
            "createdDate"   => $b["createdDate"],
            "cover"         => $b["cover"],
            "status"        => $b["status"],
            "description"   => $b["description"]
        ];
    }


    array_push($response, $key);
}

echo json_encode($response);

?>