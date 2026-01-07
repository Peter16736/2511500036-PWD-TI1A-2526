<?php
session_start();
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('index.php#contact');
}

if (!$conn) {

    $_SESSION['flash_error'] = 'Koneksi database gagal.';

    redirect_ke('index.php#contact');

}

$nama  = bersihkan($_POST['txtNama']  ?? '');
$email = bersihkan($_POST['txtEmail'] ?? '');
$pesan = bersihkan($_POST['txtPesan'] ?? '');

$captcha = trim($_POST['captcha'] ?? '');

if ($captcha !== '5') {
    $_SESSION['flash_error'] = "Jawaban captcha salah!";
    $_SESSION['old'] = $_POST;
    header("Location: index.php#contact");
    exit;
}


if ($nama === '') {
    $errors[] = 'Nama wajib diisi.';
} elseif (strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.';
}


if ($email === '') {
    $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}


if ($pesan === '') {
    $errors[] = 'Pesan wajib diisi.';
} elseif (strlen($pesan) < 10) {
    $errors[] = 'Pesan minimal 10 karakter.';
}

if (!empty($errors)) {

    $_SESSION['old'] = [
        'nama'  => $nama,
        'email' => $email,
        'pesan' => $pesan,
    ];

    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('index.php#contact');
    exit;
}

$sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    mysqli_close($conn);   
    redirect_ke('index.php#Contact');
}

mysqli_stmt_bind_param($stmt, 'sss', $nama, $email, $pesan);


if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old']);
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah tersimpan.';
    redirect_ke('index.php#Contact');
} else {
    $_SESSION['old'] = [
        'nama'  => $nama,
        'email' => $email,
        'pesan' => $pesan,
    ];

    if (strlen($nama) < 3) {
    $_SESSION['flash_error'] = "Nama minimal 3 karakter";
    header("Location: index.php");
    exit;
}

if (strlen($pesan) < 10) {
    $_SESSION['flash_error'] = "Pesan minimal 10 karakter";
    header("Location: index.php");
    exit;
}

    $_SESSION['flash_error'] = 'Data gagal disimpan. Silakan coba lagi.';
    redirect_ke('index.php#Contact');
}

mysqli_stmt_close($stmt);

$arrBiodata = [
  "nim" => $_POST["txtNim"] ?? "",
  "nama" => $_POST["txtNmLengkap"] ?? "",
  "tempat" => $_POST["txtT4Lhr"] ?? "",
  "tanggal" => $_POST["txtTglLhr"] ?? "",
  "hobi" => $_POST["txtHobi"] ?? "",
  "pasangan" => $_POST["txtPasangan"] ?? "",
  "pekerjaan" => $_POST["txtKerja"] ?? "",
  "ortu" => $_POST["txtNmOrtu"] ?? "",
  "kakak" => $_POST["txtNmKakak"] ?? "",
  "adik" => $_POST["txtNmAdik"] ?? ""
];
$_SESSION["biodata"] = $arrBiodata;

header("location: index.php#about"); 