<?php
include_once 'config.php';
if(isset($_POST['submit']))
{    
$id_film = $_POST['id_film'];
$judul = $_POST['judul'];
$genre = $_POST['genre'];
$rilis = $_POST['rilis'];

//memasukkan data ke database local
     $sql = "INSERT INTO ghibli (id_film, judul, genre, rilis)
     VALUES ($id_film,'$judul','$genre', '$rilis')";
     if (mysqli_query($mysqli, $sql)) {
        echo "<center>New record has been added successfully to local database!<br>";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($mysqli);
     }
     mysqli_close($mysqli);

// memasukkan data ke server ubuntu, lewat API
//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
$url='http://192.168.66.85/ghibli/ghibli_api.php';
$ch = curl_init($url);
// data yang akan dikirim ke REST api, dengan format json
$jsonData = array(
    'id_film' => $id_film,
    'judul' =>  $judul,
    'genre' =>  $genre,
    'rilis' =>  $rilis,
);
//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//pastikan mengirim dengan method POST
curl_setopt($ch, CURLOPT_POST, true);
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
//Execute the request
$result = curl_exec($ch);
$result = json_decode($result, true);
curl_close($ch);

//var_dump($result);
// tampilkan return statusnya, apakah sukses atau tidak
print("<center><br>status :  {$result["status"]} "); 
print("<br>");
print("message :  {$result["message"]} "); 
echo "<br>Sukses terkirim ke ubuntu server !";
echo "<br><a href=studioGhibli.php> OK </a>";
}
?>