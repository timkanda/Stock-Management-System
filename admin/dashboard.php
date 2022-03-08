<?php

session_start();
if(!isset($_SESSION["admin"])){
    ?>
    <script type="text/javascript">
    window.location="index.php";
</script>
    <?php
}
?>

<?php
include "header.php";
require_once "db_connection.php";
?>

<div id="content">
    
    <div id="content-header">
        <div id="breadcrumb"><a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Dashboard</a></div>
    </div>
   

    <div class="container-fluid">
        <div class="row-fluid" style="...">

            <div class="card" style="width:10rem; border-style: solid; border-width:1px; border-radius:10px; float:left;">
                <div class="card-body">
                    <h3 class="card-title text-center"> Total Stock</h3>
                    <h1 class="card-text text-center">
                        <?php
                        $count=0;
                        $result=mysqli_query($connection, "SELECT * FROM products");
                        $count=mysqli_num_rows($result);
                        echo $count;
                        ?>
                    </h1> 
                </div>
        </div>
        <div class="card" style="width:13rem; border-style: solid; border-width:1px; border-radius:10px; float:left; margin-left:5px;">
                <div class="card-body">
                    <h3 class="card-title text-center">No of Products</h3>
                    <h1 class="card-text text-center"> 
                        <?php
                        $count=0;
                        $result=mysqli_query($connection, "SELECT * FROM products");
                        $count=mysqli_num_rows($result);
                        echo $count;
                        ?>
                    </h1> 
                </div>
        </div>

        <div class="card" style="width:13rem; border-style: solid; border-width:1px; border-radius:10px; float:left; margin-left:5px;">
                <div class="card-body">
                    <h3 class="card-title text-center">No of Parties</h3>
                    <h1 class="card-text text-center"> 
                        <?php
                        $count=0;
                        $result=mysqli_query($connection, "SELECT * FROM party_info");
                        $count=mysqli_num_rows($result);
                        echo $count;
                        ?>
                    </h1> 
                </div>
        </div>

        <div class="card" style="width:13rem; border-style: solid; border-width:1px; border-radius:10px; float:left; margin-left:5px;">
                <div class="card-body">
                    <h3 class="card-title text-center">Purchases Made</h3>
                    <h1 class="card-text text-center"> 
                        <?php
                        $count=0;
                        $result=mysqli_query($connection, "SELECT * FROM manage_purchase");
                        $count=mysqli_num_rows($result);
                        echo $count;
                        ?>
                    </h1> 
                </div>
        </div>
        <div class="card" style="width:15rem; border-style: solid; border-width:1px; border-radius:10px; float:left; margin-left:5px;">
                <div class="card-body">
                    <h3 class="card-title text-center">No of Companies</h3>
                    <h1 class="card-text text-center"> 
                        <?php
                        $count=0;
                        $result=mysqli_query($connection, "SELECT * FROM company_name");
                        $count=mysqli_num_rows($result);
                        echo $count;
                        ?>
                    </h1> 
                </div>
        </div>
            
        </div>

    </div>
</div>

<?php
include "footer.php";
?>