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
    <link rel="stylesheet" href="./style.css">
    
    <title>Document</title>
</head>
<body>
    <div class="cau5">
        <h1>Quản lý giỏ hàng</h1>
        <form action="" class="cart__form">
            <table class="cart__form-table">
                <?php 
                   $sql_select = "SELECT * FROM SANPHAM, CTHD where SANPHAM.MASP = CTHD.MASP ORDER BY SANPHAM.MASP desc";
                   $result = mysqli_query($mysqli, $sql_select);

                ?>
                <tr>
                    <th >Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php 
                    $sum = 0;
                    while($row = mysqli_fetch_array($result)){
                         $total = $row['GIA'] * $row['SL'];
                        $sum += $total;
                ?>
                <tr>
                    <td >
                        <img src="<?php echo $row['HINHANH'] ?>" alt="" class="img__product">
                        <span><?php echo $row['TENSP'] ?></span>
                    </td>
                    <td ><?php echo $row['GIA'] ?></td>
                    <td contenteditable="true">
                        <input type="number" id="soluongsp" min="0" value="<?php echo $row['SL'] ?>">
                    </td>
                    <td><?php echo $row['GIA'] * $row['SL'] ?> đ</td>
                    <td>
                        <div class="btn__box">
                            <button class="btn__small red delete_product" data-id_xoa="<?php  echo $row['MASP']?>">
                                Xóa
                            </button>
                            <button class="btn__small blue  change_product" data-id_change="<?php  echo $row['MASP']?>" >
                                Sửa
                            </button>
                        </div>
                       
                    </td>
                </tr>
                <?php 
                    }
                ?>
                
                <tr>
                    <th colspan="3">
                        <div class="back_to_buy">
                            <a href="../sanpham_cau2/index.php" > 
                                <span>Tiếp tục mua hàng</span>
                            </a>
                        </div>
                    </th>
                    <th>Tổng tiền <?php echo $sum ?></th>
                    <th>
                        <div class="checkout">
                            <a href="../thongtinguinhan_cau6/index.php" >
                                <span>Thanh toán</span>
                            </a>
                        </div>
                    </th>
                </tr>

            </table>
        </form>
    </div>
    <script type="text/javascript">
        // //edit du lieu
        // function editCart(id){
        //     $.ajax({
        //         url:"./data.php",
        //         method: "POST",
        //         data:{id:id},
        //         success:function(data){
        //             alert('Edit du lieu thanh cong');
        //         }
        //     });
        // }
        //delete du lieu
        $(document).on('click','.delete_product',function(){
            var id = $(this).data('id_xoa');
            $.ajax({
                url:"./data.php",
                method: "POST",
                data:{id:id},
                success:function(data){
                    alert('Delete du lieu thanh cong');
                }
            });
        })

        //edit du lieu
        $(document).on('click','.change_product',function(){
            var id_change = $(this).data('id_change');
            var soluongsp = $('#soluongsp').val();
            console.log(soluongsp);
            $.ajax({
                url:"./data.php",
                method: "POST",
                data:{id_change:id_change,soluongsp:soluongsp},
                success:function(data){
                    alert('Sua du lieu thanh cong');
                }
            });
        })
                    

    </script>

</body>
</html>