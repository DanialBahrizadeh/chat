<?php
while ($row = mysqli_fetch_assoc($sql)) {
    // $sql2 = mysqli_query($con, "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
    // OR outgoing_msg_id = {$outgoing_id}) AND (incoming_msg_id = {$outgoing_id}
    // OR outgoing_msg_id = {$row['unique_id']}) ORDER BY msg_id DESC LIMIT 1");
    $sql2 = mysqli_query($con, "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
    OR outgoing_msg_id = {$row['unique_id']}) AND (incoming_msg_id = {$outgoing_id}
    OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1");
    $row2 = mysqli_fetch_assoc($sql2);
    $lastmsg = "no message has been send";
    if ($row['unique_id'] !== $outgoing_id) {
        if (mysqli_num_rows($sql2) > 0) {
            $lastmsg = $row2['msg'];
        } else {
            $lastmsg = "no message has been send";
        }
    } else {
        $sql3 = mysqli_query($con, "SELECT * FROM messages
        WHERE incoming_msg_id = {$outgoing_id} AND outgoing_msg_id = {$outgoing_id} ORDER BY msg_id DESC LIMIT 1");
        if (mysqli_num_rows($sql3) > 0) {
            $row3 = mysqli_fetch_assoc($sql3);
            $lastmsg = $row3['msg'];
        }
    }
    $lastmsg = strlen($lastmsg) > 28 ? substr($lastmsg, 0, 28) . "..." : $lastmsg;
    $sender = $outgoing_id == $row2['outgoing_msg_id'] ? "You: " : $row['fname'] . ": ";
    $offline = $row['status'] === "Offline now" ? "offline" : "";
    $output .= '
                <a href="chat.php?user.id=' . $row['unique_id'] . '">
                    <div class="content">
                        <img src="php/img/' . $row['img'] . '" alt="">
                        <div class="detalis">
                            <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                            <p>' . $sender . $lastmsg . '</p>
                        </div>
                    </div>
                    <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                </a>
        ';
}
