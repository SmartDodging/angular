<?php
$conn = new mysqli("localhost","the_avatarum_co", "UDMWWTBG", "the_avatarum_co");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$taak = $request->taak;
$persoonid = $request->persoonId;
$sql = "UPDATE taken SET verantwoordelijke=(SELECT persoon FROM personen WHERE persoonId= ".$persoonid.") WHERE taak= '".$taak."'";
$result = mysqli_query($conn, $sql);
$fh = fopen('error.txt', w);
fwrite($fh, $taak." ".$persoonid." ".$sql);
fclose($fh);
?>