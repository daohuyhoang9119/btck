<?php
$mysqli = mysqli_connect("localhost","root","","qlsp");

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
session_start();

switch ($_GET['action']) {
    case "add":
        $result = update_cart(true);
        echo json_encode(array(
            'status'=>$result,
            'message'=>"Thêm sản phẩm thành công"
        ));
        break;
    default:
        break;
}

function update_cart($add = false) {
    foreach ($_POST['number'] as $MASP => $number) {
        if ($number == 0) {
            unset($_SESSION["cart"][$MASP]);
        } else {
            if (!isset($_SESSION["cart"][$MASP])) {
                $_SESSION["cart"][$MASP] = 0;
            }
            if ($add) {
                $_SESSION["cart"][$MASP] += $number;
            } else {
                $_SESSION["cart"][$MASP] = $number;
            }
            //Kiểm tra số lượng sản phẩm tồn kho
//            $addProduct = mysqli_query($con, "SELECT `quantity` FROM `product` WHERE `id` = " . $id);
//            $addProduct = mysqli_fetch_assoc($addProduct);
//            if ($_SESSION["cart"][$id] > $addProduct['quantity']) {
//                $_SESSION["cart"][$id] = $addProduct['quantity'];
//                $GLOBALS['changed_cart'] = true;
//            }
        }
    }
    return true;
}