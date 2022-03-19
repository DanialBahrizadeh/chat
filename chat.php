<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("Location: login.php");
}
?>
<?php include_once "inc/header.php";?>

<body>

    <div class="wrapper">
        <section class="chat-area">
            <header>
<?php
include_once "inc/db.php";
$user_id = mysqli_real_escape_string($con, $_GET['user_id']);
$sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$user_id}");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}
?>
                <a href="users.php" class="back-icon" title="Return to users area"><i
                        class="fas fa-arrow-left"></i></a>
                <img src="php/img/<?php echo $row['img']; ?>" alt="">
                <div class="detalis">
                    <span><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            </header>
            <div class="chat-box">

            </div>
            <form action="#" class="typing-area">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="msg" id="input" placeholder="Type a massage here...">
                <button type="submit" title="send"><i class="fa fa-paper-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="javascript/chat.js"></script>
</body>

</html>
