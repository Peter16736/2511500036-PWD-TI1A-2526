<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  #cek method form, hanya izinkan POST
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('ubah.php');
  }

  #validasi cid wajib angka dan > 0
  $cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$cid) {
    $_SESSION['flash_error'] = 'CID Tidak Valid.';
    redirect_ke('ubah.php?cid='. (int)$cid);
  }

  #ambil dan bersihkan (sanitasi) nilai dari form
  $nim  = bersihkan($_POST['txtNimEd']  ?? '');
  $nmlengkap = bersihkan($_POST['txtNmLengkapEd'] ?? '');
  $tmptlahir = bersihkan($_POST['txtT4LhrEd'] ?? '');
  $tgllahir = bersihkan($_POST['txtTglLhrEd'] ?? '');
  $hobi = bersihkan($_POST['txtHobiEd'] ?? '');
  $pasangan = bersihkan($_POST['txtPasanganEd'] ?? '');
  $pekerjaan = bersihkan($_POST['txtKerjaEd'] ?? '');
  $nmortu = bersihkan($_POST['txtNmOrtuEd'] ?? '');
  $nmkk = bersihkan($_POST['txtNmKakakEd'] ?? '');
  $nmadk = bersihkan($_POST['txtNmAdikEd'] ?? '');

  #Validasi sederhana
  $errors = []; #ini array untuk menampung semua error yang ada

  if ($nim === '') {
    $errors[] = 'Nim wajib diisi.';
  }

  if ($nmlengkap] === '') {
    $errors[] = 'Nama wajib diisi.';
  }

  if ($tmptlahir === '') {
    $errors[] = 'Tempat Lahir wajib diisi.';
  }

  if ($tgllahir === '') {
    $errors[] = 'Tanggal lahir wajib diisi.';
  }

  if ($hobi === '') {
    $errors[] = 'Hobi wajib diisi.';
  }

  if ($pasangan === '') {
    $errors[] = 'Pasangan wajib diisi.';
  }

  if ($pekerjaan === '') {
    $errors[] = 'Pekerjaan wajib diisi.';
  }

  if ($nmortu === '') {
    $errors[] = 'Nama Orang Tua wajib diisi.';
  }

  if ($nmkk === '') {
    $errors[] = 'Nama Kakak wajib diisi.';
  }
  
  if ($nmadk === '') {
    $errors[] = 'Nama Adik wajib diisi.';
  }

  if (mb_strlen($nim) < 10) {
    $errors[] = 'Nim minimal 10 karakter.';
  }

  if (mb_strlen($nmlengkap) < 3) {
    $errors[] = 'Nama minimal 3 karakter.';
  }

  if (mb_strlen($tmptlahir) < 5) {
    $errors[] = 'Tempat Lahir minimal 5 karakter.';
  }

  if (mb_strlen($tgllahir) < 3) {
    $errors[] = 'Tanggal Lahir minimal 3 karakter.';
  }

  if (mb_strlen($hobi) < 3) {
    $errors[] = 'Hobi minimal 3 karakter.';
  }

  if (mb_strlen($pasangan) < 3) {
    $errors[] = 'Pasangan minimal 3 karakter.';
  }

  if (mb_strlen($pekerjaan) < 3) {
    $errors[] = 'Pekerjaan minimal 3 karakter.';
  }

  if (mb_strlen($nmortu) < 3) {
    $errors[] = 'Nama Orang Tua minimal 3 karakter.';
  }

  if (mb_strlen($nmkk) < 3) {
    $errors[] = 'Nama Kakak minimal 3 karakter.';
  }

  if (mb_strlen($nmadk) < 3) {
    $errors[] = 'Nama Adik minimal 3 karakter.';
  }

  /*
  kondisi di bawah ini hanya dikerjakan jika ada error, 
  simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
  */
  if (!empty($errors)) {
    $_SESSION['old'] = [
      'nim'  => $nim,
      'nmlengkap' => $nmlengkap,
      'tmptlahir' => $tmptlahir,
      'tgllahir' => $tgllahir,
      'hobi' => $hobi,
      'pasangan' => $pasangan,
      'pekerjaan' => $pekerjaan,
      'nmortu' => $nmortu,
      'nmkk' => $nmkk,
      'nmadk' => $nmadk
    ];

    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('ubah.php?cid='. (int)$cid);
  }

  /*
    Prepared statement untuk anti SQL injection.
    menyiapkan query UPDATE dengan prepared statement 
    (WAJIB WHERE cid = ?)
  */
  $stmt = mysqli_prepare($conn, "UPDATE tbl_data 
                                SET cid = ?, cnim = ?, cnmlengkap = ?, ctmptlahir = ?, ctngllahir = ?, chobi = ?, cpasangan = ?, cpekerjaan = ?, cnmortu = ?, cnmkk = ?, cnmadk = ? 
                                WHERE cid = ?");
  if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('ubah.php?cid='. (int)$cid);
  }

  #bind parameter dan eksekusi (s = string, i = integer)
  mysqli_stmt_bind_param($stmt, "ssssssssssi", $nim, $nmlengkap, $tmptlahir, $tgllahir, $hobi, $pasangan, $pekerjaan, $nmortu, $nmkk, $nmadk $cid);

  if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value
    unset($_SESSION['old']);
    /*
      Redirect balik ke ubah.php dan tampilkan info sukses.
    */
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('ubah.php'); #pola PRG: kembali ke data dan exit()
  } else { #jika gagal, simpan kembali old value dan tampilkan error umum
    $_SESSION['old'] = [
      'nim'  => $nim,
      'nmlengkap' => $nmlengkap,
      'tmptlahir' => $tmptlahir,
      'tgllahir' => $tgllahir,
      'hobi' => $hobi,
      'pasangan' => $pasangan,
      'pekerjaan' => $pekerjaan,
      'nmortu' => $nmortu,
      'nmkk' => $nmkk,
      'nmadk' => $nmadk,
    ];
    $_SESSION['flash_error'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('ubah.php?cid='. (int)$cid);
  }
  #tutup statement
  mysqli_stmt_close($stmt);

  redirect_ke('ubah.php?cid='. (int)$cid);