
<?php
$r = $_GET["tn"];
if(!$_GET["tn"])
{
  header("location:login.html");
}

  include("includes/db.php");
   ?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>





<title>DEVSHOPPE - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/boxOver.js"></script>


<style type="text/css">
.style1 {
  width: 585px;
  float: center;
  padding: 5px 10px;
  text-align: center;
}
.style2 {
  width: 520px;
  height: 33px;
  float: center;
  padding: 0 0 0 40px;
  margin: 0 0 0 12px;
  _margin: 0 0 0 6px;
  line-height: 33px;
  font-size: 12px;
  color: white;
  font-weight: bold;
  background-color: #508abb; no-repeat center;
  text-align: center;
}
.style3 {
  width: 355px;
  float: left;
  padding: 0px 0 0 75px;
  text-align: left;
}
</style>


</head>
<body>
<div id="main_container">
  <div id="header">
    <div id="logo"> <a href="#"><br><br><br>&emsp;&emsp;&emsp;&emsp;&emsp;<img src="images/devshoppe.png" alt="" border="0" width="437" height="100" /></a> </div>
    <br><br><br><br><br><br><br><br><br>
    <h1><font color="white"> &emsp;&emsp;&emsp;&emsp;"Your one stop online shop."</font></h1>
    <!-- end of oferte_content-->
  </div>
  <div id="main_content">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <!-- end of menu tab -->
    <!-- end of left content -->
    
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="style1">
      <div class="style2">INSERT NEW PRODUCTS HERE</div>
      <div class="prod_box_big">
        <div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">
        
        
        
          <div class="style3">
           
            
      
             <div class="form_row">
              <label class="contact"><strong>Product Title:</strong></label>
              <input type="text" class="contact_input" name="product_title" required />
            </div>
            
            
            <div class="form_row">
              <label class="contact"><strong>Product Category:</strong></label>
              
           <select name="product_cat" required>
           
           <option></option>
           
           
           <?php
           
          

  $get_cats = "select * from categories";
  $run_cats = mysqli_query($con,$get_cats);

  while($row_cats=mysqli_fetch_array($run_cats)){

  $cat_tit = $row_cats['cat_title'];
    $cat_id = $row_cats['cat_id'];
    

     echo "<option value=$cat_id>$cat_tit</option>";    
    


     }    
           ?>
           
           </select>
           
            </div>
            
            
            
            <div class="form_row">
              <label class="contact"><strong>Product Brand:</strong></label>
              <select name="product_brand" required>
              
              <option></option>
             <?php
                          
                          
               $get_brands = "select * from brands";
             $run_brands = mysqli_query($con,$get_brands);

             while($row_brands=mysqli_fetch_array($run_brands)){

  
               $brand_tit = $row_brands['brand_title'];
               $brand_id = $row_brands['brand_id'];
    

               echo "<option value = $brand_id > $brand_tit </option>";    
    
             }


            ?>
            
            </select>


            </div>
            <div class="form_row">
              <label class="contact"><strong>Product Image:</strong></label>
              <input type="file" class="contact_input" name="product_image" required />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Product Price:</strong></label>&nbsp;
              <input type="text" class="contact_input" name="product_price" required />
              </div>
        

       <div class="form_row">
                            &nbsp;&nbsp;<input type="submit" class="contact_input" name="index" value="INSERT" style="width: 336px"/>
              
            
            </div>
<br><br>

  
</form>    
    <!-- end of center content -->
    <!-- end of right content -->

  </div>

<br><br>
<br><br>
<br><br>
</div>
</div>
</div>


  <!-- end of main content -->
  <div class="footer">
    <div class="center_footer"><H4>All Rights Reserved 2017</H4><br />
        <br />
</div>
</div>
<!-- end of main_container -->



</body>
</html>


<?php


if(isset($_POST['index'])){

    //getting text data
   $product_title = $_POST['product_title'];
   $product_cat = $_POST['product_cat'];
   $product_brand = $_POST['product_brand'];
   $product_price = $_POST['product_price'];
   $product_desc = $_POST['product_desc'];
   $product_keywords = $_POST['product_keywords'];
   
    //getting image data
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp = $_FILES['product_image']['tmp_name'];
   
   move_uploaded_file($product_image_tmp,"product_images/$product_image");
   
   $insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image')";
   
   $run_product = mysqli_query($con,$insert_product);
   
   if($run_product){
   
   echo"<script>alert('Product Has been inserted')</script>";
   echo"<script>window.open('index.php?tn=$r','_self')</script>";
   }


}


?>


    <!--- ..............................view list .......................................................-->

