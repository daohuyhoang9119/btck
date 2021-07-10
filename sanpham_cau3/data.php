<?php
  $mysqli = mysqli_connect("localhost","root","","qlsp");

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}


  
if(isset($_POST["masp"]) && isset($_POST["tensp"]) && isset($_POST["nuocsx"]) && isset($_POST["dvtinh"]) && isset($_POST["gia"]) && isset($_POST["loaisp"]) && isset($_POST["hinhanh"]))
{
    $masp = $_POST['masp'];
    $tensp = $_POST['tensp'];
    $nuocsx = $_POST['nuocsx'];
    
    $dvtinh = $_POST['dvtinh'];
    $gia = $_POST['gia'];
    $loaisp = $_POST['loaisp'];
    $hinhanh = $_POST['hinhanh'];

    $dang_ky = mysqli_query($mysqli, "INSERT INTO sanpham(MASP, TENSP, DVT, NUOCSX,GIA,HINHANH,LOAISP) VALUE('".$masp."','".$tensp."','".$dvtinh."','".$nuocsx."','".$gia."','".$hinhanh."','".$loaisp."')");

    if($dang_ky){

      echo"Thành công";

    }
    else{

      echo"Không Thành Công";

    }
      
  }
 
?> 