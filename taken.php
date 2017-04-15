<?php
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost","the_avatarum_co", "UDMWWTBG", "the_avatarum_co");
$result = $conn->query("SELECT taak, verantwoordelijke FROM taken");
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode(array('taken' => $outp));
