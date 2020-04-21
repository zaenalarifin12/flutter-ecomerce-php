<?php

include_once("../db/db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $response       = [];
    $productName      = $_POST["productName"];
    $sellingPrice     = $_POST["sellingPrice"];
    $description      = $_POST["description"];
    $idCategory       = $_POST["idCategory"];

    $image = date("dmYHis") . str_replace(" ", "", basename($_FILES["image"]["name"]));
    $path = "../product/" . $image;

    move_uploaded_file($_FILES["image"]["tmp_name"], $path);

    $query = "INSERT INTO product VALUES (NULL, '$idCategory', '$productName', '$sellingPrice', NOW(), '$image', 1, '$description')";

    if(mysqli_query($con, $query)){
        $response["value"] = 1;
        $response["message"] = "product berhasil ditambahkan";
        echo json_encode($response);
    }else{
        $response["value"] = 2;
        $response["message"] = "please contact customer service";
        echo json_encode($response);
    }
}

?>