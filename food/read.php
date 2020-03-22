<?php
//req headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//db connection here.
include_once '../config/database.php';
include_once '../objects/food.php';

$database = new Database();
$db = $database->getConnection();

//inialize object
$food = new Food($db);

//read
$stmt = $food->read();
$num = $stmt->rowCount();

if($num>0){
    //products array
    $products_arr=array();
    $products_arr["foods"]=array();
    
    //retrive table
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $food_item=array(
            "idfood"=>$idfood,
            "name"=>$Name,
            "type"=>$Type,
            "side"=>$Side
        );

        array_push($products_arr["foods"], $food_item);
    }
    //set resposene
    http_response_code(200);
    //show products
    echo json_encode($products_arr);
}else{
    // set 404
    http_response_code(404);

    // no products found
    echo json_encode(array("message"=> "No products found"));
}
?>