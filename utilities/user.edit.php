<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $device_id = mysqli_real_escape_string($conn, $_POST['device_id']);
        $r_date = mysqli_real_escape_string($conn, $_POST['r_date']);
        $e_date = mysqli_real_escape_string($conn, $_POST['e_date']);


        if(empty($name) || empty($email) || empty($phone) || empty($role) || empty($address) || empty($r_date) || empty($e_date)) {
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= '../all.edit.users.php';
            </script>";
            exit();
        } else {
            $sql ="UPDATE users SET name='$name', email='$email', phone='$phone', role='$role', address='$address', device_id='$device_id', r_date='$r_date', e_date='$e_date' WHERE id='$id';";
            mysqli_query($conn, $sql);
            echo "<script type='text/javascript'>
            alert('Account Updated!');
            window.location= '../home.php';
            </script>";
            exit();
        }
    } else {
        header('Location: ../home.php');
        exit();
    }
