<?php
session_start();


require_once "header.php";
require_once "db_connection.php";


?> 

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="manage_stock.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Manage Stock</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="">
        <div class="span12">

      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Product Company</th>
                  <th>Product Name</th>
                  <th>Product Unit</th>
                  <th>Product Quantity</th>
                  <th>Product Price</th>
                </tr>
              </thead>
              <tbody>

              <?php
              $result=mysqli_query($connection, "SELECT * FROM stock");
              while($row=mysqli_fetch_assoc($result)){
              
                echo '<tr>
                <td> '.$row['id'].'</td>
                <td> '.$row['product_company'].'</td>
                <td> '.$row['product_name'].'</td>
                <td> '.$row['product_unit'].'</td>
                <td> '.$row['product_quantity'].'</td>
                <td> '.$row['product_price'].'</td>
              
              </tr>';
              }
              ?>
                

              </tbody>

            </table>
          </div>
              </div>
            </div>
      </div>
      
    </div>
        </div> 

    </div>
</div>


<?php
require_once "footer.php";
?>



