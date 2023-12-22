<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Perbarui Data</title>
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
    //Cek apakah ada nilai yang dikirim menggunakan methods GET dengan nama id_destinasi
    if (isset($_GET['id_destinasi'])) {
        $id_destinasi=input($_GET["id_destinasi"]);

        $sql="select * from destinasi where id_destinasi=$id_destinasi";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_destinasi=htmlspecialchars($_POST["id_destinasi"]);
        $nama_destinasi=input($_POST["nama_destinasi"]);
        $lokasi=input($_POST["lokasi"]);
        $deskripsi=input($_POST["deskripsi"]);

        //Query update data pada tabel anggota
        $sql="update destinasi set
			nama_destinasi='$nama_destinasi',
			lokasi='$lokasi',
			deskripsi='$deskripsi'
			where id_destinasi=$id_destinasi";

        //Mengeksekusi atau menjalankan query diatas
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
    <h2>Perbarui Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama Destinasi:</label>
            <input type="text" name="nama_destinasi" class="form-control" placeholder="Masukan Nama Destinasi" required />
        </div>
        <div class="form-group">
            <label>Lokasi:</label>
            <input type="text" name="lokasi" class="form-control" placeholder="Masukan Nama Lokasi" required/>
        </div>
        <div class="form-group">
            <label>Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" rows="5"placeholder="Masukan Deskripsi" required></textarea>
        </div>
        <input type="hidden" name="id_destinasi" value="<?php echo $data['id_destinasi']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>