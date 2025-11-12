<?php
session_start();
$sesnim = $_POST["txtNIM"];
$sesnama = $_POST["txtNama"];
$sestanggallahir = $_POST["txtTanggalLahir"];
$seshobi = $_POST["txtHobi"];
$_SESSION["sesnim"] = $sesnim;
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sestanggallahir"] = $sestanggallahir;
$_SESSION["seshobi"] = $seshobi;
header("location: index.php");
?>