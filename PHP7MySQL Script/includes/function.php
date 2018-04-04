<?php
require 'includes/connection.php';
function getData(){
global $conn;

$query ="SELECT * FROM `Customer`";
$result = $conn->query($query);
return $result;

}


function insertData(){
global $conn;
$sql = "INSERT INTO Customer (first_name, last_name, street,city,state,zip)
VALUES ('John', 'Doe', 'E-51','Mohali','PB','11231')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$query ="SELECT * FROM `Customer`";
$result = $conn->query($query);
return $result;
}
?>
