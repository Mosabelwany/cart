<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>shopping system</title>
</head>
<?php
include ("conection_db.php");
if(isset($_POST['user'])){
   $field1 = $_POST['user'];
    $field2 = $_POST['pass'];
		$_SESSION['user'] =1;
    $q="SELECT `user_name`,`password` FROM `user` where `user_name` =? and `password` =? ";
	  $stmt = $con->prepare($q);
	  $stmt->bind_param('ss',$field1,$field2);
		$stmt->execute();
		$res = $stmt->get_result();
		if($row = $res->fetch_array(MYSQLI_ASSOC)) {
	 echo"<script>self.location='Home.php'</script>";
    		$_SESSION['user']=1;

            
        }else{
            $_SESSION['user']=0;
                            echo"<script>self.location='index.php'</script>";

        }
        
                
         if($_SESSION['user']=1){
                				 echo"<script>self.location='Home.php'</script>";
                                 $_SESSION['owner']=$_POST['user'];
         }
            else{
                		$_SESSION['user']=0;

                echo"<script>self.location='index.php'</script>";

            }
			
      }
?>
<?php 
$q=" INSERT INTO `cart`(`owner`) VALUES (?)";
$stmt = $con->prepare($q);
$stmt->bind_param('s',$_SESSION['owner']);
  $stmt->execute();

?>
<style>
*{
    background-color:#e2e2e2;
};  

</style>
<body>
<div style="margin-top:15%; ">
 <center>
<h1 class="">Login  </h1>
    <div id="mn"class="container" >
        <form class="form"  method="POST" action="index.php"?>
        <input  class="form-control" type="text" name="user" placeholder=" user name " ><br>
            <input class="form-control" type="password" name="pass" placeholder="password"><br>
           <input class="btn btn-success" type="submit" value="Login" name="log_in">
           </center>

        </form>

    </div>
    </div>
</body>
</html>