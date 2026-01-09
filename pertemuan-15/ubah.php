<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  /*
    Ambil nilai cid dari GET dan lakukan validasi untuk 
    mengecek cid harus angka dan lebih besar dari 0 (> 0).
    'options' => ['min_range' => 1] artinya cid harus ≥ 1 
    (bukan 0, bahkan bukan negatif, bukan huruf, bukan HTML).
  */
  $cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);
  /*
    Skrip di atas cara penulisan lamanya adalah:
    $cid = $_GET['cid'] ?? '';
    $cid = (int)$cid;

    Cara lama seperti di atas akan mengambil data mentah 
    kemudian validasi dilakukan secara terpisah, sehingga 
    rawan lupa validasi. Untuk input dari GET atau POST, 
    filter_input() lebih disarankan daripada $_GET atau $_POST.
  */

  /*
    Cek apakah $cid bernilai valid:
    Kalau $cid tidak valid, maka jangan lanjutkan proses, 
    kembalikan pengguna ke halaman awal (read.php) sembari 
    mengirim penanda error.
  */


  /*
    Ambil data lama dari DB menggunakan prepared statement, 
    jika ada kesalahan, tampilkan penanda error.
  */
  $stmt = mysqli_prepare($conn, "SELECT cid, cnim, cnmlengkap, ctmptlahir, ctngllahir, chobi, cpasangan, cpekerjaan, cnmortu, cnmkk, cnmadk 
                                    FROM tbl_data WHERE cid = ? LIMIT 1");
  if (!$stmt) {
    $_SESSION['flash_error_biodata'] = 'Query tidak benar.';
    redirect_ke('liet.php');
  }

  mysqli_stmt_bind_param($stmt, "i", $cid);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error_biodata'] = 'Record tidak ditemukan.';
    redirect_ke('liet.php');
  }

  #Nilai awal (prefill form)
  $nim       = $row['cnim'] ?? '';
  $nmlengkap = $row['cnmlengkap'] ?? '';
  $tmptlahir = $row['ctmptlahir'] ?? '';
  $tgllahir  = $row['ctgllahir'] ?? '';
  $hobi      = $row['chobi'] ?? '';
  $pasangan  = $row['cpasangan'] ?? '';
  $pekerjaan = $row['cpekerjaan'] ?? '';
  $ortu      = $row['cnmortu'] ?? '';
  $kakak     = $row['cnmkk'] ?? '';
  $adik      = $row['cnmadk'] ?? '';

  #Ambil error dan nilai old input kalau ada
  $flash_error_biodata = $_SESSION['flash_error_biodata'] ?? '';
  $old = $_SESSION['old'] ?? [];
  unset($_SESSION['flash_error_biodata'], $_SESSION['old']);
  if (!empty($old)) {
    $nim        = $old['nim'] ?? $nim;
    $nmlengkap  = $old['nmlengkap'] ?? $nmlengkap;
    $tmptlahir  = $old['tmptlahir'] ?? $tmptlahir;
    $tgllahir   = $old['tgllahir'] ?? $tgllahir;
    $hobi       = $old['hobi'] ?? $hobi;
    $pasangan   = $old['pasangan'] ?? $pasangan;
    $pekerjaan  = $old['pekerjaan'] ?? $pekerjaan;
    $ortu       = $old['nmortu'] ?? $ortu;
    $kakak      = $old['nmkk'] ?? $kakak;
    $adik       = $old['nmadk'] ?? $adik;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul Halaman</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <h1>Ini Header</h1>
      <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
        &#9776;
      </button>
      <nav>
        <ul>
          <li><a href="#home">Beranda</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <section id="biodata">
      <h2>Biodata Sederhana Mahasiswa</h2>

      <?php if (!empty($flash_error_biodata)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_error_biodata; ?>
        </div>
      <?php endif; ?>
      
      <form action="proses.php" method="POST">
        <input type="text" name="cid" value="<?= (int)$cid; ?>">

        <label for="txtNim"><span>NIM:</span>
          <input type="text" id="txtNim" name="txtNimEd" placeholder="Masukkan NIM" required>
        </label>

        <label for="txtNmLengkap"><span>Nama Lengkap:</span>
          <input type="text" id="txtNmLengkap" name="txtNmLengkapEd" placeholder="Masukkan Nama Lengkap" required>
        </label>

        <label for="txtT4Lhr"><span>Tempat Lahir:</span>
          <input type="text" id="txtT4Lhr" name="txtT4LhrEd" placeholder="Masukkan Tempat Lahir" required>
        </label>

        <label for="txtTglLhr"><span>Tanggal Lahir:</span>
          <input type="text" id="txtTglLhr" name="txtTglLhrEd" placeholder="Masukkan Tanggal Lahir" required>
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobiEd" placeholder="Masukkan Hobi" required>
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasanganEd" placeholder="Masukkan Pasangan" required>
        </label>

        <label for="txtKerja"><span>Pekerjaan:</span>
          <input type="text" id="txtKerja" name="txtKerjaEd" placeholder="Masukkan Pekerjaan" required>
        </label>

        <label for="txtNmOrtu"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNmOrtu" name="txtNmOrtuEd" placeholder="Masukkan Nama Orang Tua" required>
        </label>

        <label for="txtNmKakak"><span>Nama Kakak:</span>
          <input type="text" id="txtNmKakak" name="txtNmKakakEd" placeholder="Masukkan Nama Kakak" required>
        </label>

        <label for="txtNmAdik"><span>Nama Adik:</span>
          <input type="text" id="txtNmAdik" name="txtNmAdikEd" placeholder="Masukkan Nama Adik" required>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
        <a href="liet.php" class="reset">Kembali</a>
      </form>
    </section>
    </main>

    <script src="script.js"></script>
  </body>
</html>