<?php
$conn = new mysqli("localhost","the_avatarum_co", "UDMWWTBG", "the_avatarum_co");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$taak = $request->taak;
$sql = "DELETE FROM taken WHERE taak= '".$taak."'";
$result = mysqli_query($conn, $sql);
$fh = fopen('error.txt', w);
fwrite($fh, $taak);
fclose($fh);
?>