<?php 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mysqli = new mysqli('localhost', 'root', '','db_ipsi');
    $cek = $mysqli->query("select * from user where username='" . $username . "' and password='" . $password . "'");
    $row = $cek -> fetch_object();
    if ($row) {
        header("location: ../../index.php/pages");
    }else
    header("location : login.html");
?>