<?php
session_start();
include_once "../inc/db.php";
$sql = mysqli_query($con, "SELECT * FROM users");
$outgoing_id = $_SESSION['unique_id'];
$output = "";
if (mysqli_num_rows($sql) == 1) {
    $output = "Sorry No one else Here!";
} elseif (mysqli_num_rows($sql) > 0) {
    include "../inc/data.php";
}
echo $output;
