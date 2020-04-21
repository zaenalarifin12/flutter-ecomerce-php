<?php

include_once("../db/db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $response   = [];
    $deviceInfo = $_POST["deviceInfo"];
    $idProduct  = $_POST["idProduct"];

    $cek = mysqli_query($con, "SELECT * FROM favoriteWithoutLogin WHERE deviceID = '$deviceInfo' AND idProduct = '$idProduct' ");
    $result = mysqli_fetch_array($cek);

    if(isset($result)){
        $query = "DELETE FROM favoriteWithoutLogin WHERE deviceID = '$deviceInfo' AND idProduct = '$idProduct'";
        if (mysqli_query($con, $query)) {
            
            $response["value"] = 1;
            $response["message"] = "device info success remove";
            echo json_encode($response);
        } else {
            $response["value"] = 2;
            $response["message"] = "add device info fail remove";
            echo json_encode($response);
        }
    }else{
        $query = "INSERT INTO favoriteWithoutLogin VALUES(NULL, '$deviceInfo', '$idProduct', NOW())";
        if (mysqli_query($con, $query)) {
            
            $response["value"] = 1;
            $response["message"] = "add device info success";
            echo json_encode($response);
        } else {
            
            $response["value"] = 2;
            $response["message"] = "add device info fail";
            echo json_encode($response);
        }
        
    }

}

?>