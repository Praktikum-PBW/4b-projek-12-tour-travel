<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'tourtravel_db';
    
    $conn = mysqli_connect($host,$user, $pass, $db);
    if($conn){
        //echo "Koneksi Berhasill";
    }
    
    mysqli_select_db($conn, $db);

    function registrasi($result){
        global $conn;

        $username = $result['no_telp'];
        $password = $result['password'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO users_reg VALUES('','$username','$password', 'user')");

        }
?>