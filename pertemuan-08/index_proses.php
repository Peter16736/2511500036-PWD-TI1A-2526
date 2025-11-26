<?php
session_start();

$_SESSION["sesnim"] = $_POST["txtNIM"];
$_SESSION["sesnama"] = $_POST["txtnama"];
$_SESSION["sestanggallahir"] = $_POST["txttanggallahir"];
$_SESSION["seshobi"] = $_POST["txthobi"];
$_SESSION["sespasangan"] = $_POST["txtpasangan"];
$_SESSION["sespekerjaan"] = $_POST["txtpekerjaan"];
$_SESSION["sesnamaorangtua"] = $_POST["txtnamaorangtua"];
$_SESSION["sesnamakakak"] = $_POST["txtnamakakak"];
$_SESSION["sesnamaadik"] = $_POST["txtnamaadik"]
header("location: index.php");
?>