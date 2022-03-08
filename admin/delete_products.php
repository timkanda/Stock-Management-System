<?php
session_start();
require_once "db_connection.php";

if(isset($_GET["delete"])){

    $id=$_GET["delete"];
   $delete=mysqli_query($connection, "DELETE FROM `products` WHERE id='$id'");
   if($delete){
       echo "<script>
       alert('product deleted');
       window.location.href='add_products.php';
       </script>";
       
}else{
    echo "Ooops! something is wrong";
}
}
?>