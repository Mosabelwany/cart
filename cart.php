<?php 
include('conection_db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
    <body>

<h3 class="title2" style="text-align:center;margin-top:7%; padding-bottom:15px; ">Shopping Cart Details</h3>
        <div class="table-responsive">
        <table style="width:60%;" align="center" border="3" id="table" class="table table-striped table-bordered"  dir="ltr">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

     <?php       $sqle="SELECT * FROM product_cart JOIN product on product_cart.fk_product =product.id_product WHERE fk_cart = ?";
$stmt = $con->prepare($sqle);
$stmt->bind_param('s',$_SESSION['id']);
$stmt->execute();
$res = $stmt->get_result();
while($row = $res->fetch_array(MYSQLI_ASSOC)){
    $name = $row['p_name'];
    $price = $row['price'];
    $value = $row['price']* $row['amount'];

echo'
<form method="post" action="remove_product.php"><tr>
<th width="30%">'.$name.'</th>
<input type="hidden" size="30" name="prod_id" value='.$row['id_product'].' >
<input type="hidden" size="30" name="prod_name" value='.$name.' >
<input type="hidden" name="amount" value='.$row['amount'].' >
<input type="hidden" name="price" value='.$price.' >
<th width="10%">'.$row['amount'].'</th>
<th width="13%">'.$price.'</th>
<th width="10%">'.$value.'</th>
<th width="17%"> <input  id="from" type="submit" class="btn btn-danger" name="submit" value="حذف"></th>
</tr>';
}
?>               
</table>
<center>
<a href="home.php"><button>Back</button></a>
</center>
</body> 
</html>

