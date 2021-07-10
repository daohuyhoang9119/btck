<?php 
    $mysqli = mysqli_connect("localhost","root","","thck");

	// Check connection
	if ($mysqli->connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	  exit();
	}

    //edit du lieu
    if(isset($_POST['id_change'])){
        $id_change = $_POST['id_change'];
       $soluongsp = $_POST['soluongsp'];
        $result = mysqli_query($mysqli,"UPDATE cthd SET SL='$soluongsp' WHERE  MASP='$id_change' ");
    }




    //xoa du lieu
    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $result = mysqli_query($mysqli,"DELETE FROM cthd  WHERE MASP='$id' ");
    }


?>
