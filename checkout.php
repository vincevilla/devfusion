
<html>
<head>
  <title>Checkout</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
</head>
<br><body>

<!--Table-->

<div style="margin-left:15%;padding:1px 16px;"><br><br><br>
<h3>Purchase</h3>
  <table class="table-condensed table-responsive">
  <thead style='background-none: navy; color: black;'>
  
  </thead>
  <?php
    include 'db.php';
    include 'cart.php';

    $user = $_SESSION['uid'];
    $query = mysqli_query($con,"SELECT * FROM user_info WHERE user_id='".$_SESSION['uid']."'");
    $row = mysqli_fetch_array($query);
    $first = $row['first_name'];
    $last = $row['last_name'];
    $mobile = $row['mobile'];
    $address = $row['address1'];
    echo "<center>";
    echo 'Transaction to: '.$first.' '.$last.' | Mobile: '.$mobile.' | Shipping address: '.$address;
    echo "<br><br>";
    echo "<b>";
    echo "NOTE: ";
    echo "</b>";
    echo "Your shippng number will be sent on your email. Thank you!";
    echo "</center>";

    $querytable = "SELECT * FROM cart";
    $resulttable = $con->query($querytable);
    $numresults = $resulttable->num_rows;

    if ($numresults <= 0) {
      echo "No Data";
    }
    else {
      for ($i=0; $i < $numresults; $i++) { 
        $row = $resulttable->fetch_assoc();

        $price = $row['price'];
        $qty = $row['qty'];
     



 
      }

      echo "
        </form>";
    }
  
  ?>
</table><br>


<button><a href= 'confirm.php'>Purchase</button></a>    


<input type="button" class="btn btn-success" value="Print" onClick="window.print()">	
</body>
</html>

