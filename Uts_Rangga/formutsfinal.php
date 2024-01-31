<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Masuk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        h1 {
            color: #333;
            margin-top: 0;
            text-align :center;
        }
        th, td {
            padding: 10px;
        }
        table {
            width: 40%;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th[colspan="2"] {
            vertical-align: middle; /* Tengah secara vertikal */
        }

        th {
            background: color #333;;
            color: #fff;
            font-weight: bold;
        }

        .film-image {
            max-width: 200px;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>CINEMA RANGGA XIX</h1>
    <?php
    $nama = $_POST["nama"];
    $film = $_POST["filmnya"];
    $tanggal = $_POST["tanggal"];
    $jumlah_tiket = $_POST["jumlahtiket"];
    $lokasibioskop = $_POST["lokasibioskop"];
    //$kursi = $_POST["kursi"];
    $studio =$_POST["studio"];
    ?>
    
    <!--TABEL OUTPUT DETAIL TRANSAKSI-->
    <table>
        <th colspan="2">
            <img class="film-image" src="foto/qrfoto.png" alt="Kode QR">
        </th>
        <tr class='detailtran'>
            <td><b>Detail Tiket</b></td>
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
            <td>Jumlah Tiket</td>
            <td><?php echo $jumlah_tiket; ?></td>
        </tr>
        <tr>
            <td>Seat</td>
            <td><?php 
            for ($i = 1; $i <= $jumlah_tiket; $i++) {
                $kursi = chr(64 + $i); // Mengonversi angka ke karakter (A, B, C, dst.)
                echo "Seat $kursi, ";
            }
            ?></td>
        </tr>
    </table>
</body>
</html>