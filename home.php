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
    <style>
        
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        ul{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h3{
            text-align: center;
            color: white;
            background-color: #262626;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
</head>
<body>
<center>

<div class="container" style="width: 60%; ">
<ul class="nav">
    <li class="nav-item" style="width:70%;padding-left:30%;">
<center><h2>Shopping Now</h2></center>
    </li>
    <li style="width:30%; padding-left:15%;"  class="nav-item">
<center><a href="cart.php"> <button type="button" class="btn btn-warning">Check cart<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></span></button></a>
</center>
    </li>
  </ul>
       <div class="col-md-3" style="display:inline-block;">
     </div>
        <h3>Products List</h3>
        <?php
            $query = "SELECT * FROM product ORDER BY price ASC ";
           $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
                    ?>

                    <div class="col-md-3" style="display:inline-block; padding:3px;  ">

                        <form method="post" action="save_product.php">
                            <div class="product">
                                <img src="<?php echo $row["image"]; ?>" style="width:50%; height:50%;" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <input type="number" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="pro_name" value="<?php echo $row["p_name"]; ?>">
                                <input type="hidden" name="pro_price" value="<?php echo $row["price"]; ?>"> 
                                <input type="hidden" name="id" value="<?php echo $row["id_product"]; ?>"> 
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                
              }
            }
        ?>
</center>    
</body>
</html>
<?php 
$getid =$_SESSION['owner'];
$query = "select `user_id` from `user` where `user_name` = ? "; 
$stmt = $con->prepare($query);
$stmt->bind_param('s',$getid); 
$stmt->execute();
$res = $stmt->get_result();
					while($row = $res->fetch_array(MYSQLI_ASSOC)) {
             $_SESSION['id']=$row['user_id'];
          }
?>