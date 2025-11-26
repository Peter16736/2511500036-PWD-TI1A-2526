<?php

  $arrBiodata = [
    "nim" => $_POST["txtNim"] ?? "",
    "nama" => $_POST["txtNmLengkap"] ?? "",
    "tanggal" => $_POST["txtTglLhr"] ?? "",
    "tempat" => $_POST["txtT4Lhr"] ?? "",
    "hobi" => $_POST["txtHobi"] ?? "",
    "pasangan" => $_POST["txtPasangan"] ?? "",
    "kerja" => $_POST["txtKerja"] ?? "",
    "ortu" => $_POST["txtNmOrtu"] ?? "",
    "kakak" => $_POST["txtNmKakak"] ?? "",
    "adik" => $_POST["txtNmAdik"] ?? "",
  ];

  $arrContact = [
    "nama" => $_POST["txtNama"] ?? "",
    "email" => $_POST["txtEmail"] ?? "",
    "pesan" => $_POST["txtPesan"] ?? "",
  ];
  
    $_SESSION["biodata"] = $arrBiodata;
    $_SESSION["kontak"] = $arrContact;
    header("location: index.php#contact");
?>