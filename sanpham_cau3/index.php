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
            <button type="submit" class="btn btn-primary" id = "btn-them">Thêm</button>
            <button type="submit" class="btn btn-primary">reset</button> 

         </form>
         <br>
         <?php
         include 'data.php';       
         $sql_select = mysqli_query($mysqli, "SELECT * FROM  sanpham ORDER BY MASP ASC ");
         ?>
           <div class ="table table-responsive">
               <table class ="table table-bordered">
                   <tr>
                       <td >Mã sản phẩm</td>
                       <td>Tên sản phẩm</td>
                       <td>Nước sản xuất</td>
                       <td>Đơn vị tính</td>
                       <td>Giá</td>
                       <td>Loại sản phẩm</td>
                       <td>Quản lý</td>
                   </tr>
                    
         <?php                
         if(mysqli_num_rows($sql_select)>0){
           while($row=mysqli_fetch_array($sql_select)){
             ?>
               <tr> 
                   <td  ><?php echo $row['MASP']?></td>
                   <td class = "tensp" data-id_sua= '<?php echo $row['TENSP']?>' contenteditable><?php echo $row['TENSP']?></td>
                   <td><?php echo $row['NUOCSX']?></td>
                   <td><?php echo $row['DVT']?></td>
                   <td><?php echo $row['GIA']?></td>
                   <td><?php echo $row['LOAISP']?></td>
                   <td><button data-id_xoa='<?php echo $row['MASP']?>'class = "btn btn-sm btn-danger del_data" name="delete-data">Xóa</button></td>
                   <!-- <td><button data-id_sua='<?php echo $row['MASP'] ?>'class = "btn btn-sm btn-danger upd_data"name="change-data">Sửa</button></td> -->
               </tr>          
             <?php
           }
         }
            ?>         
         </table></div>
         
         
         
         
      
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script>
      $(document).ready(function(){
         function fetch_data(){
            $.ajax({
            method: "POST",
            url:'data.php' ,
            
            success: function(data){
              $('#load-data').html(data);
              
            }       
          });
         } 
         fetch_data(); 
         //xóa
         $(document).on('click','.del_data',function(){
             var id = $(this).data('id_xoa');
             $.ajax({
               method: "POST",
               url:'data.php' ,
               data:{id:id},
               success:function(data){
                  alert('XÓa thành công');
                  fetch_data();
               }
            })
         })
         //sửa
         function edit_data(id, text, column_name){
            $.ajax({
               method: "POST",
               url:'data.php' ,
               data:{id:id, text:text, column_name:column_name},
               success:function(data){
                  alert('Sửa thành công');
                  fetch_data();
               }
            })
         }
         $(document).on('blur','.tensp',function(){
             var id_sua = $(this).data('id_sua');
             var text = $(this).text();
             edit_data(id_sua,text,"tensp");
         })
         $( "#themsp_form" ).submit(function( event ) {
          event.preventDefault();
          $.ajax({
            type: "POST",
            url:'data.php' ,
            data:  $( this ).serializeArray(),

            success: function(msg){
              alert(msg);
               fetch_data();
               $('#themsp_form')[0].reset();
            },
           

            
          });
        
        });
      })
      //   $( "#themsp_form" ).submit(function( event ) {
      //     event.preventDefault();
      //     $.ajax({
      //       type: "POST",
      //       url:'./data.php' ,
      //       data:  $( this ).serializeArray(),

      //       success: function(msg){
      //         alert(msg);
      //       },
           

            
      //     });
        
      //   });
      </script> 
</body>
</html>