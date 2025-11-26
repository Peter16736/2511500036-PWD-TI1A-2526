<?php
session_start();

$sesnim = $_SESSION["sesnim"];
$sesnama = $_SESSION["sesnama"];
$sestanggallahir = $_SESSION["sestanggallahir"];
$sestempatlahir = $_SESSION["sestempatlahir"];
$seshobi = $_SESSION["seshobi"];
$sespasangan = $_SESSION["sespasangan"];
$sesnamaorangtua = $_SESSION["sespekerjaan"];
$sesnamakakak = $_SESSION["sesnamakakak"];
$sesnamaadik = $_SESSION["sesnamaadik"];

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
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="PendaftaranProfilPengunjung">
      <h2>Pendaftaran Profil Pengunjung</h2>
      <form action="index_proses.php" method="POST">

        <label for="txtNIM"><span>NIM:</span>
          <input type="text" id="txtNIM" name="txtNIM" placeholder="Masukkan NIM" required autocomplete="NIM">
        </label>

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtTempatLahir"><span>Tanggal Lahir:</span>
          <input type="text" id="txtTanggalLahir" name="txtTanggalLahir" placeholder="Masukkan Tanggal Lahir" required autocomplete="Tanggal Lahir">
        </label>

        <label for="txtTempatLahir"><span>Tempat Lahir:</span>
          <input type="Tempat Lahir" id="txtTempatLahir" name="txtTempatLahir" placeholder="Masukkan Tempat Lahir" required autocomplete="Tempat Lahir">
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="Hobi" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi" required autocomplete="Hobi">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="Pasangan" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Pasangan" required autocomplete="Pasangan">
        </label>

        <label for="txtPekerjaan"><span>Pekerjaan:</span>
          <input type="Pekerjaan" id="txtPekerjaan" name="txtPekerjaan" placeholder="Masukkan Pekerjaan" required autocomplete="Pekerjaan">
        </label>

        <label for="txtHobi"><span>Nama Orang Tua:</span>
          <input type="Nama Orang Tua" id="txtNamaOrangTua" name="txtNamaOrangTua" placeholder="Masukkan Nama Orang Tua" required autocomplete="Nama Orang Tua">
        </label>

        <label for="txtHobi"><span>Nama Kakak:</span>
          <input type="Nama Kakak" id="txtNamaKakak" name="txtNamaKakak" placeholder="Masukkan Nama Kakak" required autocomplete="Nama Kakak">
        </label>

        <label for="txtHobi"><span>Nama Adik:</span>
          <input type="Nama Adik" id="txtNamaAdik" name="txtNamaAdik" placeholder="Masukkan Nama Adik" required autocomplete="Nama Adik">
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

    </section>

    <section id="about">
      <?php
      $nim = 2511500010;
      $NIM = '0344300002';
      $nama = "Say'yid Abdullah";
      $Nama = 'Al\'kautar Benyamin';
      $tempat = "Jebus";
      ?>
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong>
        <?php
        ?>
      </p>
      <p><strong>Nama Lengkap:</strong>
        <?php
        ?>
      </p>
      <p><strong>Tempat Lahir:</strong> <?php ?></p>
      <p><strong>Tanggal Lahir:</strong> </p>
      <p><strong>Hobi:</strong> </p>
      <p><strong>Pasangan:</strong> </p>
      <p><strong>Pekerjaan:</strong> </p>
      <p><strong>Nama Orang Tua:</strong> </p>
      <p><strong>Nama Kakak:</strong> </p>
      <p><strong>Nama Adik:</strong> <?php  ?></p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

    
        <br><hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
 



    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>