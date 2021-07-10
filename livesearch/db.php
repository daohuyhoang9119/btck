<?php
if(isset($_GET['data'])){
$data = $_GET['data'];
$con = mysqli_connect("localhost","root","","qlsp");
// Kiểm tra kết nối
if (mysqli_connect_errno()){
echo "Lỗi kết nối: " . mysqli_connect_error();
}

$sql = "SELECT * FROM sanpham WHERE TENSP LIKE '$data%'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)){
echo $row['TENSP']."</br>";
}
//Đóng kết nối
mysqli_close($con);

}
?>