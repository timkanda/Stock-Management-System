<?php
require_once "db_connection.php";

if(isset($_GET["delete"])){
    $id= $_GET["delete"];
    $deleteunit = "DELETE FROM `units` WHERE id='$id'";
    $delete = mysqli_query($connection,$deleteunit);
    if(isset($delete)){

        header ("location:add_new_unit.php");

    }else{
        echo "delete failed";

    }

    

}