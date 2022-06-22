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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2 style="color:#FFFFFF;font-weight:bold;">Add New Film</h2>
                    </div>
                    <p>Silahkan masukan film Studio Ghibli yang sudah ditonton.</p>
                    <form action="insertGhibliDo.php" method="post">
                    <div class="form-group">
                        <label>Id Film</label>
                        <input type="text" name="Id_film" class="form-control" placeholder="Masukan ID Film" required />
                    </div>
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="Judul" class="form-control" placeholder="Masukan Judul" required/>
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <input type="text" name="Genre" class="form-control" placeholder="Masukan Genre" required></input>
                    </div>
                    <div class="form-group">
                        <label>Rilis</label>
                        <input type="date" name="Rilis" class="form-control"/>
                    </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>