<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request(
    'POST',
    'http://192.168.1.85/ghibli/ghibli_api.php'
);

$body_json = $response->getBody();
$result = json_decode($body_json); 

$data = $result->data;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "config.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['id_film'])) {
        $id_film=input($_GET["id_film"]);

        $sql="SELECT * from ghibli where id_film=$id_film";
        $hasil=mysqli_query($mysqli,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_film=htmlspecialchars($_POST["id_film"]);
        $judul=input($_POST["judul"]);
        $genre=input($_POST["genre"]);
        $rilis=input($_POST["rilis"]);

        //Query update data pada tabel anggota
        $sql="UPDATE ghibli set
			judul='$judul',
			genre='$genre',
			rilis='$rilis'
			where id_film=$id_film";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($mysqli,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Judul:</label>
            <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" placeholder="Masukan Judul" required />

        </div>
        <div class="form-group">
            <label>Genre:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['genre']; ?>" placeholder="Masukan Genre" required/>

        </div>
        <div class="form-group">
            <label>Rilis:</label>
            <input type="date" name="rilis" class="form-control" value="<?php echo $data['rilis']; ?>" placeholder="Masukan Tanggal Rilis" required/>
        </div>
        <input type="hidden" name="id_film" value="<?php echo $data['id_film']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>