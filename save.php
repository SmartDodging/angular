<?php
//setting variables and connecting to the database
$host = "the-avatarum.com.mysql";
$dbName = "the_avatarum_co";
$username = "the_avatarum_co";
$password = "UDMWWTBG";
$conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
//decoding the received data
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
//binding the received data to variables
$taak = $request->taak;
$taakid = $request->taakId;
$persoonid = $request->persoonId;
$sql = "UPDATE taken SET verantwoordelijke=(SELECT persoon FROM personen WHERE persoonId= :persoonid) WHERE taak= ':taak' AND taakId= :taakid";
//preparing the sql
$stmt = $conn->prepare($sql);
$stmt->bindValue(":persoonid", $persoonid);
//binding the bound taak to the prepared query
$stmt->bindValue(":taak", $taak);
$stmt->bindValue(":taakid", $taakid);
//executing the query
$stmt->execute();
?>