<?php
$con = mysqli_connect("localhost", "root", "", "chat");
if (!$con) {
    echo "Error: " . mysqli_connect_error();
}
