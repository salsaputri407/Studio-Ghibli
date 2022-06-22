<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ghibli App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
     <style>
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

table {
	width: 800px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,
td {
	padding: 15px;
	background-color: rgba(255,255,255,0.2);
	color: #fff;
}

th {
	text-align: left;
}

thead {
	th {
		background-color: #55608f;
	}
}

tbody {
	tr {
		&:hover {
			background-color: rgba(255,255,255,0.3);
		}
	}
	td {
		position: relative;
		&:hover {
			&:before {
				content: "";
				position: absolute;
				left: 0;
				right: 0;
				top: -9999px;
				bottom: -9999px;
				background-color: rgba(255,255,255,0.2);
				z-index: -1;
			}
		}
	}
}
</style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <p><p>
<div class="wrapper">
        <div class="container-fluid">
            <div style="margin:60px;text-align:center;">
                <h1 style="color:#FFFFFF;font-weight:bold;">Studio Ghibli</h3>
            </div>
            <div style="text-align:center;">
                <a href="index.html" class="btn btn-primary" role="button">Sinopsis</a>
                <a href="insertMahasiswaView.php" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
            </div>    
            <div class="row">
                <div class="col-md-12">
                <div class="container-fluid">
                    <div class="mt-5 mb-3 clearfix">
                        <h3 class="pull-left" style="color:#FFFFFF;font-weight:bold;">Studio Ghibli (Windows OS)</h2>
                    </div>
                    <div class="scroll">
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM ghibli";
                    if($result = mysqli_query($mysqli, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Judul</th>";
                                        echo "<th>Genre</th>";
                                        echo "<th>Rilis</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_film'] . "</td>";
                                        echo "<td>" . $row['judul'] . "</td>";
                                        echo "<td>" . $row['genre'] . "</td>";
                                        echo "<td>" . $row['rilis'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="updateMahasiswaView.php?id_film='. $row['id_film'] .'"class="btn btn-primary" role="button""><span class="fa fa-pencil"></span></a>&ensp;';
                                            echo '<a href="deleteMahasiswaDo.php?id_film='. $row['id_film'] .'" class="btn btn-danger" role="button" "><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($mysqli);
                    ?>
                </div>
            </div>
            </div>        
        </div>
    </div>    

    <p>
    <div class="wrapper">
        <div class="container-fluid">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h3 class="pull-left" style="color:#FFFFFF;font-weight:bold;">Studio Ghibli (Ubuntu OS)</h3>
                    </div>
                    <div class="scroll">
                    <?php
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    //Pastikan sesuai dengan alamat endpoint dari REST API di UBUNTU, 
                    curl_setopt($curl, CURLOPT_URL, 'http://192.168.66.85/ghibli/ghibli_api.php');
                    $res = curl_exec($curl);
                    $json = json_decode($res, true);

                            echo '<table class="table table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Judul</th>";
                                        echo "<th>Genre</th>";
                                        echo "<th>Rilis</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                for ($i = 0; $i < count($json["data"]); $i++){
                                    echo "<tr>";
                                        echo "<td> {$json["data"][$i]["Id_film"]} </td>";
                                        echo "<td> {$json["data"][$i]["Judul"]} </td>";
                                        echo "<td> {$json["data"][$i]["Genre"]} </td>";
                                        echo "<td> {$json["data"][$i]["Rilis"]} </td>";
                                        echo "<td>";
                                            echo '<a href="updateMahasiswaView.php?Id_film='. $json["data"][$i]["Id_film"] .'"class="btn btn-primary" role="button""><span class="fa fa-pencil"></span></a>&ensp;';
                                            echo '<a href="deleteMahasiswaDo.php?Id_film='. $json["data"][$i]["Id_film"] .'" class="btn btn-danger" role="button" "><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                    curl_close($curl);
                    ?>
                </div>
                </div>
            </div>        
        </div>
    </div>

    <p><p><p>
    
    
</body>
</html>