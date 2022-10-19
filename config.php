<?php
include("./view.php");
session_start();
$mysqli = new mysqli("localhost", "root","","siswa_salsa" );
if($mysqli -> connect_errno){
    echo "Failed to connect to Mysql :" . $mysqli -> connect_errno;
    exit();
}
?>