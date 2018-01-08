
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/mystyle.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
  <?php
  include ('db.php');
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM user WHERE username = '$username'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  ?>
      

<div class="header">   
<div class="form1">
<div class="row">
  <div class="col-md-8">
    <h2 style="margin-left: 200px; margin-top: 1px;"><?php echo $row['f_name']," ", $row['l_name'];?></h2>
  </div>
  
</div>
</div>
</div>




<!--Table-->

<div style="margin-left:15%;padding:1px 16px;"><br><br><br>
<h3>Purchase</h3>
  <table class="table-condensed table-responsive">
  <thead style='background-none: navy; color: black;'>
  <tr>
    <th>Product </th>
    <th>Price </th>
    <th>Quantity </th>
    <th></th>
  </tr>
  </thead>
  <?php
    include 'db.php';
    $querytable = "SELECT * FROM basket";
    $resulttable = $conn->query($querytable);

    $numresults = $resulttable->num_rows;

    if ($numresults <= 0) {
      echo "No Data";
    }
    else {
      for ($i=0; $i < $numresults; $i++) { 
        $row = $resulttable->fetch_assoc();
        echo "
        <form action=\"deleteorder.php\" method=\"post\">
          <tr>
            <td>".$row['product_name']."</td>
            <td>Php ".$row['product_price']."</td>
            <td>x ".$row['quantity']."</td>
            
            <input name=\"rowid\" type=\"hidden\" value=\"".$row['basket_id']."\">
          </tr>
        </form>
        ";
      }
    }
  
  ?>
</table><br>
<h5>Total Amount</h5>
<?php
  include ('db.php');
  $sql ="SELECT SUM(total_amount) AS value_sum FROM cart"; 
  $result = $conn->query($sql);
$row = $result->fetch_assoc();
$sum = $row['value_sum'];
echo "<h3><strong>Php $sum</strong></h3>";
  ?><br>
<input type="submit" class="no-print" onclick="window.print()" style="width:200px; right:0px" value="Print Receipt">
</div>



</body>
</html>
