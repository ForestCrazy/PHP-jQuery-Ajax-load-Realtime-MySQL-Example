<?php
$connect = new mysqli("localhost","root","","ExampleAjax");
$connect->query('SET names utf8');
if($connect->connect_errno) {
    exit("Error-> ".$connect->connect_error);
}


$query = 'SELECT * FROM user ORDER BY id ASC';
$result = $connect->query($query);
$num_field = $result->num_rows;


$userarray = array();

while ($fetch_user = mysqli_fetch_assoc($result)) {
    $arraycol = array();
    $arraycol["id"] = $fetch_user["id"];
    $arraycol["firstName"] = $fetch_user["firstName"];
    $arraycol["lastName"] = $fetch_user["lastName"];
    $arraycol["username"] = $fetch_user["username"];
    $arraycol["email"] = $fetch_user["email"];
    $arraycol["CountryCode"] = $fetch_user["CountryCode"];
    array_push($userarray, $arraycol);
}
mysqli_close($connect);

echo json_encode($userarray);