<?php
	//require("index.php")
	
	
	$mysqli = mysqli_connect("localhost","root","","qlsp");

	// Check connection
	if ($mysqli->connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	  exit();
	}
	$key=$_POST['loaisp'];

	if($key==1){
		$result = mysqli_query($mysqli, "select * from sanpham ") ;

	}
	else{
		$result = mysqli_query($mysqli, "select * from sanpham where LOAISP = '$key' ") ;
	}

	
	
	
			

?>
<link rel="stylesheet" href="sp.css">
<!-- <div id="loaddl"> -->
	
		<ul class="collection__products"> 
         <?php
          while($row = mysqli_fetch_array($result)){
        ?> 
        <li class="collection__product">
          <div class="product__card">
		  
              
                
                  <img
                    src="<?php echo $row['HINHANH'] ?>"
                    alt=""
                   
                  />
                
              
            <p><?php echo $row['TENSP'] ?></p>
            <p>Đơn vị tính: <?php echo $row['DVT'] ?></p>
            <p>Giá: <?php echo number_format($row['GIA']),' VND'?></p>
			<div class="soluong">
			<p>Số lượng</p>
            <form class="soluong1" action="" method="POST">

            <input type="number" name ="number[<?= $row['MASP'] ?>]" min = "0" max = "15" class="page__cart-product-input" value="1" />
			    <input class="pay"   type="submit" id="btn_pay" name="btn_pay" value="chọn mua">
            </form>
            
                
                

            
			
			</div>
			
          </div>
        </li>
        <?php
         }
        ?>
       </ul> 
       </script>

                   
          <script>
        


          $( ".soluong1" ).submit(function( event ) {


          event.preventDefault();
          alert("quick");
          $.ajax({
            type: "POST",
            url:'./datagh.php?action=add' ,
            data:  $( this ).serializeArray(),
              success: function(response){
                response = JSON.parse(response);
                if(response.status==0){
                  alert(response.message);

                }
                else{
                  alert(response.message);
                  
                  
                  

                }

              }

          });

        });

      </script>
      










