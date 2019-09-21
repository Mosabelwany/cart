<?php
include('conection_db.php');
?>
<?php 
if(isset($_POST['add'])){
    $proname=$_POST['quantity'];
    $amount=$_POST['pro_name'];
    $price=$_POST['pro_price'];
    $id=$_POST['id'];
    $query = "select `quantity` from `product` where `id_product` = ? "; 
$stmt = $con->prepare($query);
$stmt->bind_param('i',$id); 
$stmt->execute();
$res = $stmt->get_result();
					while($row = $res->fetch_array(MYSQLI_ASSOC)) {
             $bal=$row['quantity'];
          }if ($bal == '0' or $_POST['quantity'] > $bal ){
            echo '<script language="javascript">';
            echo 'alert("Unvalid Quantity")';
            echo '</script>';
            echo"<script>self.location='home.php'</script>";
           }else{
            $qu="INSERT INTO `product_cart`(`fk_product`, `fk_cart`,`amount`) 
            VALUES(?, ?,?); ";
            $stmt = $con->prepare($qu);
            $stmt->bind_param('iii',$_POST['id'],$_SESSION['id'],$_POST['quantity']); 
            $stmt->execute();
            $sq="UPDATE
              `product`
            SET
              `quantity` = `quantity` - ?
            WHERE
              `id_product` = ?; ";
            $stmt = $con->prepare($sq);
            $stmt->bind_param('ii',$_POST['quantity'],$_POST['id']);
            $stmt->execute();
            echo"<script>self.location='home.php'</script>";
          
          }

 }


?> 