<?php
header("Content-Type: application/json; charset=UTF-8");
//setting variables and connecting to the database
$host = "the-avatarum.com.mysql";
$dbName = "the_avatarum_co";
$username = "the_avatarum_co";
$password = "UDMWWTBG";
$conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);

$sql = "SELECT persoonId , persoon FROM personen";
//preparing the sql
$stmt = $conn->prepare($sql);
//executing the query
$stmt->execute();
//binding the selected data to a variable
$outp = $stmt->fetchAll();
//returning the data encoded in json
echo json_encode(array('person' => $outp));
