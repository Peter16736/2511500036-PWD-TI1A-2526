<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen</title>
    <link rel="stylesheet" href="style.css">

    <style>
        #about, 
        #contact,
        #IPK {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            max-width: 700px;
            margin: 20px auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        #about h2,
        #contact h2
        #IPK h2 {
            color: #003366;
            border-bottom: 2px solid #003366;
            padding-bottom: 6px;
            margin-top: 0;
            margin-bottom: 16px;   
        }

        #about p,
        #IPK p,
        #contact label {
            display: flex;
            justify-content: flex-start;
            align-items: baseline;
            margin: 0;
            padding: 6px 0;
            border-bottom: 1px solid #e6e6e6;
        }

        #about strong,
        #contact label>span {
            min-width: 180px;
            color: #003366;
            font-weight: 600;
            text-align: right;
            padding-right: 16px;
            flex-shrink: 0;
        }

        #contact input,
        #contact textarea {
            flex: 1;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 8px;
            color: #000;
            font-weight: normal;
            margin: 0;
            box-sizing: border-box;
        }
        #contact button {
            margin-top: 10px;
            display: inline-block;
            padding: 10px 24px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            margin-right: 8px;
        }

        #contact button[type="submit"] {
            background-color: #003366;
            color: #fff;
            font-weight: 600;
        }

        #contact button[type="reset"] {
            background-color: #b4b4b4;
            color: #272727;
            font-weight: 500;
        }

        #contact button[type="submit"]:hover {
            background-color: #0379ee;
            transform: translateY(-1px);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        #contact button[type="reset"]:hover {
            background-color: #cccccc;
            transform: translateY(-1px);
        }

        @media (max-width: 600px){
            #about p,
            #contact label {
                flex-direction: column;
                align-items: flex-start;
            }

            #about strong,
            #contact label>span {
                text-align: left;
                padding-right: 0;
                margin-bottom: 2px;
            }
            #contact input,
            #contact textarea,
            #contact button {
                width: 100%;
            }
        }
    </style>
</head>

<body>    
 <header>
    <h1>&hearts; Ini Header &hearts;</h1>
    <button class="menu-toggle" id="menuToggle"  aria-label="Toggle Navigation">
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
     <h2>&#9787; Selamat datang &#9787;</h2>
     <?php
     echo "halo dunia<br>";
     echo "Nama saya Peter";
     ?>
     <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="about">
     <?php
        $nim = 2511500036;
        $NIM = 2511500000;
        $nama = "Peter Imanuel";
        $Tempatlahir = "Pangkal pinang";
        $Tanggallahir = "16 Juli 2007";
        $Hobi = "Basket";
        $Pasangan = "Belum ada";
        $Pekerjaan = "Tidak ada";
        $Ortuteman = "Bapak Rokrok dan FonFon";
        $Namakakak1 = "Christine";
        $Namakakak2 = "Sherly";
     ?>
     <h2>Tentang saya</h2>
     <p><strong>NIM:</strong>
        <?php
        echo $nim;
        ?>
    </p>
     <p><strong>Nama Lengkap:</strong>
     <?php
     echo $nama;
     ?>
     &#9786;</p>
     <p><strong>Tempat Lahir:</strong>
     <?php
     echo $Tempatlahir;
     ?>
     </p>
     <p><strong>Tanggal Lahir:</strong>
     <?php
     echo $Tanggallahir
     ?>
     </p>
     <p><strong>Hobi:</strong>
     <?php
     echo $Hobi
     ?>
     &#9786;</p>
     <p><strong>Pasangan&hearts;:</strong>
     <?php
     echo $Pasangan
     ?>
     </p>
     <p><strong>Pekerjaan:</strong>
     <?php
     echo $Pekerjaan
     ?>
     <p><strong>Nama Kakak 1:</strong>
     <?php
     echo $Namakakak1
     ?>
     </p>
     <p><strong>Nama Kakak 2:</strong>
     <?php
     echo $Namakakak2
     ?>
     </p>
    </section>
    <section id="contact">
     <h2>&deg; Kontak kami &deg;</h2>
     <form action="" method="GET">
        <label for="txtNama"><span>Nama:</span>
        <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan Nama" required autocomplete="name">
        </label>
        <label for="txtEmail"><span>Email:</span>
        <input type="Email" id="txtEmail" name="txtEmail" placeholder="Masukkan Email" required autocomplete="email">
        </label>
        <label for="txtPesan"><span>Pesan Anda:</span>
        <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tuliskan pesan anda ..." required></textarea>
        <small id="charCount">0/200 karakter</small>
        </label>
        
        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
     </form>
    </section>

    <section id="IPK">
        <h2>Nilai Saya</h2>
        <?php
            $namaMatkul1 = "Kalkulus";
            $namaMatkul2 = "Logika Infomatika";
            $namaMatkul3 = "Pengantar Teknik Informatika";
            $namaMatkul4 = "konsep Basis Data";
            $namaMatkul5 = "Pemrograman Web Dasar";
            $sksMatkul1 = "3";
            $sksMatkul2 = "3";
            $sksMatkul3 = "3";
            $sksMatkul4 = "3";
            $sksMatkul5 = "3";
            $nilaiTugas1 = "";
            $nilaiTugas2 = "";
            $nilaiTugas3 = "";
            $nilaiTugas4 = "";
            $nilaiTugas5 = "";
            $nilaiUTS1 = "";
            $nilaiUTS2 = "";
            $nilaiUTS3 = "";
            $nilaiUTS4 = "";
            $nilaiUTS5 = "";
            $nilaiUAS1 = "";
            $nilaiUAS2 = "";
            $nilaiUAS3 = "";
            $nilaiUAS4 = "";
            $nilaiUAS5 = "";
        ?>
        <p><strong>Nama Matkul:</strong>
        <?php
        echo $namaMatkul1
        ?>
        </p>
        <p><strong>SKS Matkul:</strong>
        <?php
        echo $sksMatkul1
        ?>
        </p>
        <p><strong>Nilai Tugas:</strong>
        <?php
        echo $nilaiTugas1
        ?>
        </p>
        <p><strong>Nilai UTS:</strong>
        <?php
        echo $nilaiUTS1
        ?>
        </p>
        <p><strong>Nilai UAS:</strong>
        <?php
        echo $nilaiUAS1
        ?>
        </p>
    </section>
 </main>

 <footer>
    <p>&copy; 2025 Peter Imanuel NIM 2511500036</p>
 </footer>

 <script src="script.js"></script>
</body>
</html>