<?php
session_start();
require_once "db_connection.php";
if(isset($_GET["delete"])){
$id=$_GET["delete"];

$deletequery= "DELETE FROM `party_info` WHERE id='$id'";
$delete= mysqli_query($connection, $deletequery);
if(isset($delete)){
    echo "<script>
    alert('user deleted');
    window.location.href='add_new_party.php';
    </script>";
    }else{
        echo "deleting failed";
    }

}