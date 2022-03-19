<?php

session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "../inc/db.php";
    $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
    $outgoing_id = mysqli_real_escape_string($con, $_POST['outgoing_id']);
    $msg = mysqli_real_escape_string($con, $_POST['msg']);
    if (!empty($msg)) {
        $sql = mysqli_query($con, "INSERT INTO messages(incoming_msg_id,outgoing_msg_id,msg)
                    VALUES ({$incoming_id},{$outgoing_id},'{$msg}')")
        or die();
    }
} else {
    header('Location: ./login.php');
}
