<?php
session_start();
include "../inc/db.php";
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($con, "SELECT email FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "This email is alrady Exsist!";
        } else {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                //extinshion of img
                $img_explode = explode(".", $img_name);
                $img_ext = end($img_explode);

                $ext = ['png', 'jpg', 'jpeg', 'jfif'];
                if (in_array($img_ext, $ext)) {
                    $time = time();
                    $new_img_name = $time . $img_name;
                    if (move_uploaded_file($tmp_name, "img/" . $new_img_name)) {
                        $status = "Active now";
                        $random_id = rand(time(), 1000000);

                        // insert the data
                        $sql2 = mysqli_query($con, "INSERT INTO users(unique_id,fname,lname,email,password,img,status)
                        VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
                        if ($sql2) {
                            $sql3 = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success";
                            }
                        } else {
                            echo "Something went wrong!";
                        }
                    }
                } else {
                    echo "the file extensions must be png or jpg or jpeg";
                }
            } else {
                echo "please Select an image file";
            }
        }
    } else {
        echo $email . "not an valid Email";
    }
} else {
    echo "All Inputs Are Required!";
}
