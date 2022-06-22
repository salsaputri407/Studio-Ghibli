<?php
/*
require_once "config.php";
$sql = "SELECT * FROM mahasiswa";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
    		$data=array();
            while($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
            }
            $json = json_encode($data);
			echo $json;
        mysqli_free_result($result);
    } else{
        echo "No records were found.";
    }
} else{
    echo "Oops! Something went wrong. Please try again later.";
}
*/
?>

<?php
require_once "config.php";
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["id_film"]))
         {
            $id=intval($_GET["id_film"]);
            get_mhs($id);
         }
         else
         {
            get_mhss();
         }
         break;
   case 'POST':
         if(!empty($_GET["id_film"]))
         {
            $id=intval($_GET["id_film"]);
            update_mhs($id);
         }
         else
         {
            insert_mhs();
         }     
         break; 
   case 'DELETE':
          $id=intval($_GET["id_film"]);
            delete_mhs($id);
            break;
   default:
      // Invalid Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      break;
 }



   function get_mhss()
   {
      global $mysqli;
      $query="SELECT * FROM ghibli";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get List Film Ghibli Successfully.',
                     'data' => $data
                  );
     // header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   function get_mhs($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM ghibli";
      if($id != 0)
      {
         $query.=" WHERE id_film=".$id." LIMIT 1";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get Film Ghibli Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
        
   }
 
   function insert_mhs()
      {
         global $mysqli;
         if(!empty($_POST["id_film"])){
            $data=$_POST;
         }else{
            $data = json_decode(file_get_contents('php://input'), true);
         }

         $arrcheckpost = array('id_film' => '', 'judul' => '','genre' => '','rilis' => '');
         $hitung = count(array_intersect_key($data, $arrcheckpost));
         if($hitung == count($arrcheckpost)){

               $result = mysqli_query($mysqli, "INSERT INTO ghibli SET
               id_film = '$data[id_film]',
               judul = '$data[judul]',
               genre = '$data[genre]',
               rilis = '$data[rilis]'");
                
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Film Ghibli Added Successfully.'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Film Ghibli Addition Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function update_mhs($id)
      {
         global $mysqli;
	 if(!empty($_POST["id_film"])){
            $data=$_POST;
         }else{
            $data = json_decode(file_get_contents('php://input'), true);
         }
         $arrcheckpost = array('judul' => '','genre' => '','rilis' => '');
         $hitung = count(array_intersect_key($data, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
              $result = mysqli_query($mysqli, "UPDATE ghibli SET
              judul = '$data[judul]',
              genre = '$data[genre]',
              rilis = '$data[rilis]'
              WHERE id_film='$id'");
          
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Film Ghibli Updated Successfully.'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Film Ghibli Updation Failed.'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function delete_mhs($id)
   {
      global $mysqli;
      $query="DELETE FROM ghibli WHERE id_film=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Film Ghibli Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Film Ghibli Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }

 
?> 
