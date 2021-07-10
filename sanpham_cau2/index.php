<?php
	session_start();
?>


<!DOCTYPE html>
<html>
<head>
<title>bat dau</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="sp.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="" type="text/javascript"></script>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="container">
   <div class="cbb">

   <div class="dropdown">
    
  
      <select name="" id="status_id" class="custom-select custom-select-sm">
         <option selected>chọn sản phẩm</option>
         
         <option value="1">chọn tất cả sản phẩm</option>
         <option value="bút">Sản phẩm bút </option>
         <option value="phấn">Sản phẩm phấn </option>
         <option value="bảng">Sản phẩm bảng </option>
         <option value="tập">Sản phẩm tập </option>
      
      </select>

   </div>

   </div>
   <div id="loaddl"></div>


   
      
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
      $(document).ready(function(){
         $('#status_id').change(function(){
            var loaisp = $(this).val();
            //alert(loaisp);
            $.ajax({
               url:'./data.php',
               method:"POST",
               data:{loaisp:loaisp},
               success:function(data){
                  $('#loaddl').html(data);
               }
            });
         });
      });
</script>

</body>
</html>