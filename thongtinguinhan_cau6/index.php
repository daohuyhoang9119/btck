<?php
	//require("index.php")
	
	
	$mysqli = mysqli_connect("localhost","root","","thck");

	// Check connection
	if ($mysqli->connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	  exit();
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="./thongtin.css">

    <title>Document</title>
</head>
<body>
    
    <div class="cau6">
        <div class="left">
            <form action="" class="info-box">
                <table class="info__box-table">
                    <tr>
                        <th>Thông tin giao hàng</th>
                        <th>Thông tin nhận hàng</th>
                    </tr>
                    <tr>
                        <td>Họ tên</td>
                        <td>Địa chỉ nhận hàng</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" placeholder="Họ tên" class="input__style" id="hovaten">
                        </td>
                        <td>
                            <input type="text" placeholder="13 abc xyz" class="input__style" id="diachi">
                        </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>Tỉnh/Thành phố</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" placeholder="09xxxxxxxx" class="input__style" id="sophone">
                        </td>
                        <td>
                            <select name="city" id="city" class="input__style" id="tinh">
                                <option value="" disabled selected >Vui lòng chọn tỉnh/thành phố</option>
                                <option value="TP HCM">TP HCM</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="Cà Mau">Cà Mau</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>Quận/Huyện</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="email" placeholder="abc@example.com" class="input__style" id="email">
                        </td>
                        <td>
                            <select name="district" id="district" class="input__style" id="quan">
                                <option value="" disabled selected >Vui lòng chọn quận/huyện</option>
                                <option value="Nhà Bè">Nhà Bè</option>
                                <option value="Cần Giờ">Cần Giờ</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Phường/Xã</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <select name="ward" id="ward" class="input__style" id="phuong">
                                <option value="" disabled selected >Vui lòng chọn phường/xã</option>
                                <option value="Phường 1">Phường 1</option>
                                <option value="Phường 2">Phường 2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn__submit-container">
                                <input type="button" value="Thanh toán" id="btn__insert-info" class="btn__submit-info-customer">
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="right">
            <form action="" class="cart__box">
                <table class="cart__box-table">
                    <?php 
                       $sql_select = "SELECT * FROM SANPHAM, CTHD where SANPHAM.MASP = CTHD.MASP ORDER BY SANPHAM.MASP desc";
                        $result = mysqli_query($mysqli, $sql_select);
                    ?>
                    <tr>
                        <th>Cart</th>
                        <th>Sl</th>
                        <th>Gia</th>
                    </tr>
                    <?php 
                        $sum = 0;
                        while($row = mysqli_fetch_array($result)){
                            $total = $row['GIA'] * $row['SL'];
                            $sum += $total;
                    ?>
                    
                    <tr>
                        <td><?php echo $row['TENSP'] ?></td>
                        <td><?php echo $row['SOLUONG'] ?></td>
                        <td><?php echo $row['GIA'] * $row['SL'] ?> đ</td>
                    </tr>
                    <!-- <tr>
                        <td>But bi</td>
                        <td>10</td>
                        <td>30000 đ</td>
                    </tr> -->
                    <?php 
                        }
                    ?>
                    <tr>
                        <th colspan="2">Total</th>
                        <th><?php echo $sum ?> đ</th>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script type="text/javascript">

        $('#btn__insert-info').on('click',function(){
            var hovaten = $('#hovaten').val();
            var diachi = $('#diachi').val();
            var email = $('#email').val();
            var sophone = $('#sophone').val();
            var tinh = $('#tinh :selected').val();
            var quan = $('#quan').find(":selected").text();
            var phuong = $('#phuong').find(":selected").text();
            $('#tinh').change(function(){
                $('#quan').change(function(){
                    $('#phuong').change(function(){
                        var tinh = $('#tinh').val();
                        var quan = $('#quan').val();
                        var phuong = $('#phuong').val();
                        
                    })
                })
            })
           

            if(hovaten == '' || diachi == '' || email == '' || sophone == '' || tinh == '' || quan == '' || phuong == ''){
                alert('Không được bỏ trống các trường');
            }else{
                $.ajax({
                    url: "ajax_action.php",
                    method: "POST",
                    data:{hovaten:hovaten,diachi:diachi,email:email,sophone:sophone},
                    success:function(data){
                        if($data == 1){
                            alert('Thanh toán thành công')
                        }else{
                            alert("Thanh toán thất bại")
                        }
                    }
                });
            }
        });

    </script>
</body>
</html>