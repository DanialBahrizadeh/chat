<?php

session_start();
include_once "../inc/db.php";
$searchvalue = mysqli_real_escape_string($con, $_POST['searchValue']);
$outgoing_id = $_SESSION['unique_id'];

$sql = mysqli_query($con, "SELECT * FROM users WHERE fname LIKE '%{$searchvalue}%' OR lname LIKE '%{$searchvalue}%'");

$output = "";
if (mysqli_num_rows($sql) > 0) {
    include "../inc/data.php";
} else {
    $output = "the user not exist";
}
echo $output;
