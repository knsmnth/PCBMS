<?php
session_start();
include "../model/UserDAO.php";

$username = $_POST["username"];
$password = $_POST["password"];
$role = $_POST["role"];

$process = new UserDAO();

$getResult = $process->personnel($username, $password);
foreach ($getResult as $row) {
    if ($row == 'Empty') {
        session_destroy();
        header("Location: ../?Invalid= 1");
    } else {
        $_SESSION["userid"] = $row['userid'];
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        if ($role == $row['role']) {
            $_SESSION["fname"] = $row['fname'];
            $_SESSION["mname"] = $row['mname'];
            $_SESSION["lname"] = $row['lname'];
            $_SESSION['role'] = $role;
            if ($row['role'] == 'Cashier') {
                header("Location: ../pos/");
            } else if ($row['role'] == 'Manager') {
                header("Location: ../manage/index.php");
            } else if ($row['role'] == 'Personnel') {
                header("Location: ../dtr/");
            } else {
                header("Location: ../?Invalid= 2");
            }
        } else {
            session_destroy();
            header("Location: ../?Invalid= 2");
        }
    }
}