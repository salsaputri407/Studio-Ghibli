<!DOCTYPE html>
<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request(
    'GET',
    'http://192.168.1.85/ghibli/ghibli_api.php'
);

$body_json = $response->getBody();
$result = json_decode($body_json); 

$data = $result->data;

?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ghibli App</title>
</head>
<body>
<div class="container">
    <br>
    <center><h2>Studio Ghibli</h2>

    <table class="table table-bordered table-dark">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Rilis</th>
            <th>Aksi</th>

        </tr>
        </thead>
            <tbody>
            <?php
                foreach ($data as $value) {
                    echo "
                        <tr>
                        <td>" . $value->Id_film . "</td>
                        <td>" . $value->Judul . "</td>
                        <td>" . $value->Genre . "</td>
                        <td>" . $value->Rilis . "</td>
                        <td>
                        <a href='update.php' class='btn btn-warning' role='button'>Edit</a>
                        <a href='' class='btn btn-danger' role='button'>Delete</a>
                        </td>
                        </tr>
                        ";
                    }
             ?>
            </tbody>
    </table>
    <a href="insertMahasiswaView.php" class="btn btn-primary" role="button">Tambah Film</a>
    <a href="index.html" class="btn btn-primary" role="button">API Eksternal</a>

</div>

</body>
</html>