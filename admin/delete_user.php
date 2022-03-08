<?php
session_start();
require_once "db_connection.php";

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $deletequery = "DELETE FROM `user_registration` WHERE id='$id'";
    $delete = mysqli_query($connection,$deletequery);
    if(isset($delete)){
        echo "<script>
    alert('user deleted');
    window.location.href='add_new_user.php';
    </script>";
    }else{
        echo "deleting failed";
    }
}

 ?>

