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
</head>
<body>
    <div class="container">
        <div style="margin:60px;text-align:center;">
            <h1 style="color:#FFFFFF;font-weight:bold;">Studio Ghibli</h3>
        </div>
        <div style="text-align:center;">
                <a href="index.html" class="btn btn-primary" role="button">Sinopsis</a>
                <a href="case6/studioGhibli.php" class="btn btn-danger"> Kasus 6</a>
            </div> 
        <div class="mt-5 mb-3 clearfix">
            <a href="insertGhibliView.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New</a>
        </div>
                    <?php
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    //Pastikan sesuai dengan alamat endpoint dari REST API di UBUNTU, 
                    curl_setopt($curl, CURLOPT_URL, 'http://192.168.66.85/ghibli/ghibli_api.php');
                    $res = curl_exec($curl);
                    $json = json_decode($res, true);

                            echo '<table class="table table">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>No</th>";
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
                                        echo '<a href="updateGhibliView.php?Id_film='. $json["data"][$i]["Id_film"] .'"class="btn btn-primary" role="button""><span class="fa fa-pencil"></span></a>&ensp;';
                                        echo '<a href="deleteGhibliDo.php?Id_film='. $json["data"][$i]["Id_film"] .'" class="btn btn-danger" role="button" "><span class="fa fa-trash"></span></a>';
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
</body>
</html>