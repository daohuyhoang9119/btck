<?php
 session_start();
 if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}


 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/fontawesome.min.css">
    <title>Document</title>
</head>
<body>
    <?php
$mysqli = mysqli_connect("localhost","root","","qlsp");

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
$products = mysqli_query($mysqli, "SELECT * FROM `sanpham` WHERE `MASP` IN (" . implode(",", array_keys($_POST['number'])) . ")");

while ($row = mysqli_fetch_array($products)) {

    



?>

<p>Giá: <?php echo number_format($row['GIA']),' VND'?></p>
<?php
}
?>

    <div class="cau5">
        <h1>Quản lý giỏ hàng</h1>
        <form action="" class="cart__form">
            <table class="cart__form-table">
                <tr>
                    <th >Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <tr>
                    <td>
                        <img src="./gioi-thieu-ve-chiec-but-bi.png" alt="" class="img__product">
                        <span> <?php echo $row['TENSP'] ?></span>
                    </td>
                    <td>5000 đ</td>
                    <td>
                        <input type="number" min="0">
                    </td>
                    <td>50000 đ</td>
                    <td>
                        <div class="btn__box">
                            <button class="btn__small red">
                                <i class="far fa-window-close"></i>
                            </button>
                            <button class="btn__small blue">
                                <i class="far fa-calendar-check"></i>
                            </button>
                        </div>
                       
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="./gioi-thieu-ve-chiec-but-bi.png" alt="" class="img__product">
                        <span>but bi</span>
                    </td>
                    <td>5000 đ</td>
                    <td>
                        <input type="number" min="0">
                    </td>
                    <td>50000 đ</td>
                    <td>
                        <div class="btn__box">
                            <button class="btn__small red">
                                <i class="far fa-window-close"></i>
                            </button>
                            <button class="btn__small blue">
                                <i class="far fa-calendar-check"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        <div class="back_to_buy">
                            <a href="#" > 
                                <i class="fas fa-angle-left"></i>
                                <span>Tiếp tục mua hàng</span>
                            </a>
                        </div>
                    </th>
                    <th>Tổng tiền 80000 đ</th>
                    <th>
                        <div class="checkout">
                            <a href="#" >
                                <span>Thanh toán</span>
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </div>
                    </th>
                </tr>

            </table>
        </form>
    </div>
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
                            <input type="text" placeholder="Họ tên" class="input__style">
                        </td>
                        <td>
                            <input type="text" placeholder="13 abc xyz" class="input__style">
                        </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>Tỉnh/Thành phố</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" placeholder="09xxxxxxxx" class="input__style">
                        </td>
                        <td>
                            <select name="city" id="city" class="input__style">
                                <option value="" disabled selected hidden>Vui lòng chọn tỉnh/thành phố</option>
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
                            <input type="email" placeholder="abc@example.com" class="input__style">
                        </td>
                        <td>
                            <select name="district" id="district" class="input__style">
                                <option value="" disabled selected hidden>Vui lòng chọn quận/huyện</option>
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
                            <select name="ward" id="ward" class="input__style">
                                <option value="" disabled selected hidden>Vui lòng chọn phường/xã</option>
                                <option value="Phường 1">Phường 1</option>
                                <option value="Phường 2">Phường 2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn__submit-container">
                                <input type="submit" value="Thanh toán" class="btn__submit-info-customer">
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="right">
            <form action="" class="cart__box">
                <table class="cart__box-table">
                    <tr>
                        <th>Cart</th>
                        <th>Sl</th>
                        <th>Gia</th>
                    </tr>
                    <tr>
                        <td>But bi</td>
                        <td>10</td>
                        <td>50000 đ</td>
                    </tr>
                    <tr>
                        <td>But bi</td>
                        <td>10</td>
                        <td>30000 đ</td>
                    </tr>
                    <tr>
                        <th colspan="2">Total</th>
                        <th>80000 đ</th>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>