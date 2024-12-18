<?php 
include("../db_connection/db_info.php");

if(isset($_GET["gender"]) && $_GET["gender"] >= 0 && $_GET["gender"] <= 2){
    $gender = $_GET["gender"];
    $query = $mysqli->prepare("Select * FROM users WHERE gender = ?");
    $query->bind_param("i", $gender);
}else{
    $query = $mysqli->prepare("Select * FROM users;");
}

$query->execute();
$array = $query->get_result();

$array_response = []; 
while ($user = $array->fetch_assoc()){
    $array_response[] = $user;
}

echo json_encode($array_response);

?>