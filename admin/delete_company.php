<?php
session_start();
require_once "db_connection.php";

    if(isset($_GET["delete"])){

    $id=$_GET["delete"];
$delete=mysqli_query($connection, "DELETE FROM `company_name` WHERE id='$id'");
if ($delete) {
    echo "<script>
    alert('Company deleted');
    window.location.href='add_new_company.php';
    </script>";
    
} else {
    echo "Ooop! Something happened!";

}

}else{
    header("location:add_new_company.php");
}

?>