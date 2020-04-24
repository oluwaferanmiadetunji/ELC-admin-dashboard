<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);

        if(empty($username) || empty($password) || empty($role)) {
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= '../index.php';
            </script>";
            exit();
        } else {
            $sql = "INSERT INTO `admin` (`id`, `username`, `password`, `role`)
            VALUES (NULL, '$username', '$password', '$role');";
            mysqli_query($conn, $sql);
            echo "<script type='text/javascript'>
            alert('Admin Added!');
            window.location= '../all.admins.php';
            </script>";
            exit();
        }
    } else {
        header('Location: ../index.php');
        exit();
    }
