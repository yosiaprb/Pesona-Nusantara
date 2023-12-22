<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Tambahkan Data</title>
</head>
<body>
<div class="container" style="margin-top: 2rem;">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama_destinasi=input($_POST["nama_destinasi"]);
        $lokasi=input($_POST["lokasi"]);
        $deskripsi=input($_POST["deskripsi"]);
        
        //Query input menginput data kedalam tabel anggota
        $sql="insert into destinasi (nama_destinasi, lokasi, deskripsi) values
		('$nama_destinasi','$lokasi','$deskripsi')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Masukkan Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Destinasi:</label>
            <input type="text" name="nama_destinasi" class="form-control" placeholder="Masukkan Nama Destinasi" required />
        </div>
        <div class="form-group">
            <label>Lokasi:</label>
            <input type="text" name="lokasi" class="form-control" placeholder="Masukkan Nama Lokasi" required/>
        </div>
        <div class="form-group">
            <label>Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" rows="5"placeholder="Masukkan Deskripsi" required></textarea>
        </div>       
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>