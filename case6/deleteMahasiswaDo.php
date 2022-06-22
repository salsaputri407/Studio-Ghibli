<?php
include_once 'config.php';
$id_film = $_GET['id_film'];

//delete data di database local
     $sql = "delete from ghibli where id_film=$id_film";
     if (mysqli_query($mysqli, $sql)) {
        echo "<center>Record has been deleted successfully in local database!<br>";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($mysqli);
     }
     mysqli_close($mysqli);


// delete data di OS ubuntu
//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
$url='http://192.168.66.85/ghibli/ghibli_api.php?id_film='.$id_film.'';


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
// pastikan method nya adalah delete
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$result = json_decode($result, true);

curl_close($ch);

//var_dump($result);
// tampilkan return statusnya, apakah sukses atau tidak
print("<center><br>status :  {$result["status"]} "); 
print("<br>");
print("message :  {$result["message"]} "); 
 //
echo "<br>Sukses menghapus data di ubuntu server !";
echo "<br><a href=studioGhibli.php> OK </a>";

?>