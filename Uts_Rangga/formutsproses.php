<!DOCTYPE html>
<html>
<head>
    <title>Detail Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 40%;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .film-image {
            max-width: 200px;
            display: block;
            margin: 0 auto; /* Tengah secara horizontal */
        }
        th[colspan="2"] {
            vertical-align: middle; /* Tengah secara vertikal */
        }
        .button-container {
            text-align: center;
        }
        input[type="submit"],
        input[type="reset"] {
            background-color: Grey;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px;
        }
        input[type="submit"]:hover{
            background-color: Green;
        }
        input[type="reset"]:hover {
            background-color: Red;
        }
    </style>
</head>

<body>
    <h1>CINEMA RANGGA XIX</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $film = $_POST["filmnya"];
        $tanggal = $_POST["tanggal"];
        $jumlah_tiket = $_POST["jumlahtiket"];
        $lokasibioskop = $_POST["lokasibioskop"];
        $harga_tiket = 0;
        $pajak = 0;
        $studio = "";

        //array untuk seleksi foto sesuai judul
        $picsfilm = [
            "Diambang Kematian" => "foto/Diambang_kematian.png",
            "Pamali Dusun Pocong" => "foto/pamalipocong.png",
            "Indigo" => "foto/Indigo.png",
            "KKN Di Desa Penari" => "foto/kkn_poster.png",
            "Kisah Tanah Jawa Pocong Gundul" => "foto/kisahtanahjawa.png",
            "Saw X" => "foto/SawX.png",
            "SIJJIN" => "foto/Sijjin_pict.png",
            "Kuntilanak 3" => "foto/Kuntilanak3.png",
            "Saranjana" => "foto/Saranjana.png",
            "Perjamuan Iblis" => "foto/Perjamuan_iblis.png",
        ];

    
        if ($jumlah_tiket > 0 && $jumlah_tiket <= 5) { // Memeriksa apakah jumlah tiket diatas 0 dan <= 5. 
            if (array_key_exists($film, $picsfilm)) {

                // menentukan harga film dan studio sesuai judul (pake or untuk memperpendek if aja sih jadi value harga, dll jadi sama)
                if ($film == "Diambang Kematian" or $film == "SIJJIN") {
                    $harga_tiket = 30000;
                    $studio = "Studio 1";
                } elseif ($film == "Pamali Dusun Pocong" or $film == "Indigo") {
                    $harga_tiket = 35000;
                    $studio = "Studio 2";
                }  elseif ($film == "KKN Di Desa Penari" or $film == "Kisah Tanah Jawa Pocong Gundul") {
                    $harga_tiket = 30000;
                    $studio = "Studio 4";
                }elseif ($film == "Saw X" or $film == "Kuntilanak 3") {
                    $harga_tiket = 35000;
                    $studio = "Studio 5";
                } elseif ($film == "Saranjana" or $film == "Perjamuan Iblis") {
                    $harga_tiket = 50000;
                    $studio = "Studio IMAX";
                } else {
                    echo "Film belum dipilih atau tidak valid.";
                }
                
                // pajak sesuai metode pembayaran
                $bayar = $_POST['bayar'];
                if ($bayar === "Dana") {
                    $pajak = $harga_tiket * $jumlah_tiket * 0.10;
                } elseif ($bayar === "Gopay") {
                    $pajak = $harga_tiket * $jumlah_tiket * 0.10; 
                } elseif ($bayar === "Tunai/Cash") {
                    $pajak = $harga_tiket * $jumlah_tiket * 0.05;    
                }  elseif ($bayar === "Transfer/Bank") {
                    $pajak = $harga_tiket * $jumlah_tiket * 0.15;    
                } else {
                    echo "Pilih Metode Pembayaran yang valid";
                }
    
                // Menghitung total harga dan harga tiket satuan
                $total_harga = $harga_tiket * $jumlah_tiket + $pajak;
                $hrgtiketmurni = $harga_tiket * $jumlah_tiket;

            } else {
                echo "Film belum dipilih atau tidak valid.";
                exit;
            }
        } else {
            echo "<b>Jumlah Pembelian Tiket Minimal 1 dan Maksimal 5.<b> <br>";
            echo "MOHON ISI DENGAN VALID !!!";
            exit; //berhenti ketika tiket lebih dari 5
        }
    } 
    ?>
    
    <!--TABEL OUTPUT DETAIL TRANSAKSI-->
    <table border="0">
        <th colspan="2">
            <img class="film-image" src="<?php echo $picsfilm[$film]; ?>" alt="Gambar Film">
        </th>
        <tr class='detailtran'>
            <td><b>Detail Transaksi</b></td>
        </tr>

        <tr>
            <td>Nama</td>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <td>Lokasi</td>
            <td><?php echo $lokasibioskop; ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><?php echo $tanggal; ?></td>
        </tr>
        <tr>
            <td>Film</td>
            <td><?php echo $film; ?></td>
        </tr>
        <tr>
            <td>Studio</td>
            <td><?php echo $studio; ?></td>
        </tr>
        <tr>
        <td>Seat</td>
        <td>
        <?php
        for ($i = 1; $i <= $jumlah_tiket; $i++) {
            $kursi = chr(64 + $i); // Mengonversi angka ke karakter (A, B, C, dst.)
            echo "Seat $kursi, ";

        }
        ?>
        </td>
        </tr>
        <tr>
            <td>Jumlah Tiket</td>
            <td><?php echo $jumlah_tiket; ?></td>
        </tr>
        <tr>
            <td>Tiket</td>
            <td><?php echo number_format($harga_tiket, 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>Pembayaran</td>
            <td><?php echo $bayar;?></td>
        </tr> 
        <tr>
            <td>Jumlah Harga Tiket</td>
            <td><?php echo number_format($hrgtiketmurni, 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>Pajak</td>
            <td><?php echo number_format($pajak, 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>Total Harga</td>
            <td><?php echo number_format($total_harga, 0, ',', '.'); ?></td>
        </tr>

    </table>
    
    <div class="button-container">
    <form action="formutsfinal.php" method="POST">
        <input type="hidden" name="nama" value="<?php echo $nama; ?>">
        <input type="hidden" name="lokasibioskop" value="<?php echo $lokasibioskop; ?>">
        <input type="hidden" name="tanggal" value="<?php echo $tanggal; ?>">
        <input type="hidden" name="studio" value="<?php echo $studio; ?>">
        <input type="hidden" name="kursi" value="<?php echo $kursi; ?>">
        <input type="hidden" name="jumlahtiket" value="<?php echo $jumlah_tiket; ?>">
        <input type="hidden" name="filmnya" value="<?php echo $film; ?>">

        <a href="formuts.php">Kembali</a>
        <label for="lanjutkan"></label>
        <input type="submit" name='lanjutkan' value="Lanjutkan">
    </div>
    </form>
   </div>
</body>
</html>