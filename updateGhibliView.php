<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
        html,
        body {
	        height: 100%;
        }

        body {
            margin: 0;
            background: linear-gradient(45deg, #c572ad, #5daeb1);
            font-family: sans-serif;
            font-weight: 100;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        form {
            border-collapse: collapse;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 15px;
            text-align: left;
        }
        label,p {
            color:#FFFFFF;
        }
    </style>
</head>
<body>

<?php
 $id_film = $_GET['Id_film'];
 $curl= curl_init();
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 //Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
 curl_setopt($curl, CURLOPT_URL, 'http://192.168.66.85/ghibli/ghibli_api.php?id_film='.$id_film.'');
 $res = curl_exec($curl);
 $json = json_decode($res, true);
//var_dump($json);
?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2 style="color:#FFFFFF;font-weight:bold;">Update Data</h2>
                    </div>
                    <p>Perbaiki data film Studio Ghibli yang sudah ditonton disini!</p>
                    <form action="updateGhibliDo.php" method="post">
                        <input type = "hidden" name="Id_film" value="<?php echo"$id_film";?>">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" value="<?php echo($json["data"][0]["Judul"]); ?>">
                        </div>
                        <div class="form-group">
                            <label>Genre</label>
                            <input type="text" name="genre" class="form-control" value="<?php echo($json["data"][0]["Genre"]); ?>">
                        </div>
                        <div class="form-group">
                            <label>Rilis</label>
                            <input type="date" name="rilis" class="form-control" value="<?php echo($json["data"][0]["Rilis"]); ?>">
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>