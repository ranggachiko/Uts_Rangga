<!DOCTYPE html>
<html>
<head>
    <title>Form Pemesanan Tiket Bioskop</title>
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
        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        select {
            appearance: none;
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
    <form method="post" action="formutsproses.php">

        <!--Nama Pemesan-->
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>

        <!--Lokasi Bioskop-->
        <label for="lokasibioskop">Lokasi:</label>
        <select name="lokasibioskop">
            <option value="pilih">-pilih-</option>
            <option value="Koja Trade Mall">Koja Trade Mall</option>
            <option value="Asia Plaza Sumedang">Asia Plaza Sumedang</option>
            <option value="Courts KHI XIX">Courts KHI XIX</option>
            <option value="Mega Bekasi XIX">Mega Bekasi XIX</option>
            <option value="Revo Town XIX">Revo Town XIX</option>
            <option value="Summarecon Mall Bekasi XIX">Summarecon Mall Bekasi XIX</option>

        </select>

        <!--Tanggal-->
        <label for="tanggal"> Tanggal:</label>
        <input type="date" name ="tanggal" required>

        <!--Menu Film-->
        <label for="filmnya">Pilih Film:</label>
        <select name="filmnya">
            <option value="pilih">-pilih-</option>
            <option value="Diambang Kematian">Diambang Kematian</option>
            <option value="Pamali Dusun Pocong">Pamali Dusun Pocong</option>
            <option value="Indigo">Indigo</option>
            <option value="KKN Di Desa Penari">KKN Di Desa Penari</option>
            <option value="Kisah Tanah Jawa Pocong Gundul">Kisah Tanah Jawa Pocong Gundul</option>
            <option value="Kuntilanak 3">Kuntilanak 3</option>
            <option value="SIJJIN">SIJJIN</option>
            <option value="Saranjana">Saranjana</option>
            <option value="Perjamuan Iblis">Perjamuan Iblis</option>
            <option value="Saw X">Saw X</option>
        </select>

        <!--jumlah tiket-->
        <label for="jumlahtiket">Jumlah Tiket:</label>
        <input type="number" name="jumlahtiket" required>

        <!--Menu Bayar-->
     <label for='bayar'>Pembayaran :</label>
        <input type="radio" name='bayar' value='Tunai/Cash'>Tunai
        <input type="radio" name='bayar' value='Transfer/Bank'>Transfer Bank
        <input type="radio" name='bayar' value='Dana'>Dana
        <input type="radio" name='bayar' value='Gopay'>Gopay


        <div class="button-container">
            <input type="submit" value="Pesan Tiket">
            <input type="reset" value="Batal">
        </div>
    </form>
</body>
</html>