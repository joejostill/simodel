<?php 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mysqli = new mysqli('localhost', 'root', '','restoran');
    $cek = $mysqli->query("select * from user where username='" . $username . "' and password='" . $password . "'");
    $row = $cek -> fetch_object();
    if ($row) {
        header("location: menu.html");

    }else
    header("location : login.html");
?>