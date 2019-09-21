
<?php
include('conection_db.php'); 

var_dump($_POST);
?> 
<?php 
if(isset($_POST['amount'])){
$pro_name=$_POST['prod_name'];
$amount =$_POST['amount'];
$price= $_POST['price'];    
$pro_id= $_POST['prod_id'];    

$qu="delete  from `product_cart` where `amount`=? and `fk_product`=?  ; ";
            $stmt = $con->prepare($qu);
            $stmt->bind_param('ii',$amount,$pro_id); 
            $stmt->execute();
            $sq="UPDATE
              `product`
            SET
              `quantity` = `quantity`+ ?
            WHERE
              `id_product` = ?; ";
            $stmt = $con->prepare($sq);
            $stmt->bind_param('ii',$amount,$pro_id);
            $stmt->execute();
            echo"<script>self.location='cart.php'</script>";

}




?>