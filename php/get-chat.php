<?php

session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "../inc/db.php";
    $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
    $outgoing_id = mysqli_real_escape_string($con, $_POST['outgoing_id']);

    $output = "";

    $sql = mysqli_query($con, "SELECT * FROM messages
    LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
    WHERE (incoming_msg_id = {$incoming_id} AND outgoing_msg_id = {$outgoing_id})
    OR (incoming_msg_id = {$outgoing_id} AND outgoing_msg_id = {$incoming_id}) ORDER BY msg_id");

    if (mysqli_num_rows($sql) > 0) {

        while ($row = mysqli_fetch_assoc($sql)) {

            if ($row['outgoing_msg_id'] == $outgoing_id) {
                $output .= '
                <div class="chat outgoing">
                    <div class="details">
                        <p>' . $row['msg'] . '</p>
                    </div>
                </div>
            ';
            } else {
                $sql2 = mysqli_query($con, "SELECT img FROM users WHERE unique_id = {$incoming_id}");
                $img = mysqli_fetch_assoc($sql2);
                $output .= '
                <div class="chat incoming">
                    <img src="php/img/' . $row['img'] . '" alt="">
                    <div class="details">
                        <p>' . $row['msg'] . '</p>
                    </div>
                </div>
            ';
            }
        }
    }
} else {
    header('Location: ./login.php');
}
echo $output;
