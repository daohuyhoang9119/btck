<!DOCTYPE html>
<html>
<head>
<title>bat dau</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="/BTTHT5/sanpham_cau2/themsp.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="" type="text/javascript"></script>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <div class="container-fluid mt-3">
         <h4 class="mb-2">Thêm sản phẩm</h4>
         <form id ="themsp_form"action="" method="POST">
            
            <div class="form-group">
               <label for="inputAddress">Mã sản phẩm</label>
               <input type="text" class="form-control"
                  id="masp"  name="masp">
            </div>
            <div class="form-group">
               <label for="inputAddress2">Tên sản phẩm</label>
               <input type="text" class="form-control"
                  id="tensp"   name="tensp" >
            </div>
            <div class="form-group">
               <label for="inputAddress">Nước sản xuất</label>
               <input type="text" class="form-control"
                  id="nuocsx"  name="nuocsx" >
            </div>
            <div class="form-group">
               <label for="inputAddress2">Đơn vị tính</label>
               <input type="text" class="form-control"
                  id="dvtinh"   name="dvtinh">
            </div>
            <div class="form-group">
               <label for="inputAddress">Giá</label>
               <input type="text" class="form-control"
                  id="gia" name="gia">
            </div>
            <div class="form-group">
               <label for="inputAddress2">Loại sản phẩm</label>
               <input type="text" class="form-control"
                  id="loaisp" name="loaisp" >
            </div>
            <div class="form-group">
               <label for="inputAddress2">Hình ảnh</label>
               <input type="text" class="form-control"
                  id="hinhanh"  name ="hinhanh">
            </div>
            
              
              
           
            <button type="submit" class="btn btn-primary">Thêm</button>
            <button type="submit" class="btn btn-primary">reset</button> 

         </form>
         
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script>
        $( "#themsp_form" ).submit(function( event ) {
          event.preventDefault();
          $.ajax({
            type: "POST",
            url:'./data.php' ,
            data:  $( this ).serializeArray(),

            success: function(msg){
              alert(msg);
            },
           

            
          });
        
        });
      </script> 
</body>
</html>