<?php
session_start();

require_once "header.php";
require_once "db_connection.php";

if(isset($_POST["save"])){

$companyname = $_POST["company_name"];
$productname = $_POST["product_name"];
$unit = $_POST["unit"];
$packagingsize = $_POST["packaging_size"];

$count=0;
$query=mysqli_query($connection,"SELECT * FROM `products` WHERE company_name='$companyname' AND product_name='$productname' AND unit='$unit' AND packaging_size='$packagingsize'");
$count= mysqli_num_rows($query);
if ($count>0){
  echo "Product Exists!!";
}else{
  $add="INSERT INTO `products`(`id`,`company_name`, `product_name`, `unit`, `packaging_size`) VALUES ('NULL','$companyname','$productname','$unit','$packagingsize')";
  $save=mysqli_query($connection,$add);
  if(isset($save)){

    echo "Product Added!!";
  }
}
}

?> 

<div id="content">
   
    <div id="content-header">
        <div id="breadcrumb"><a href="add_products.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Add New Products</a></div>
    </div>
   
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add new Products</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="" method="post" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Select company:</label>
              <div class="controls">

               <select class="span11" name="company_name">
                  
                  <?php
                  $result=mysqli_query($connection, "SELECT * FROM company_name");
                  while($row=mysqli_fetch_assoc($result)){

                    echo "<option>";
                    echo $row["comp_name"];
                    echo "</option>";
                  }

                  ?>
               </select>
              </div>
            </div>
              
            <div class="control-group">
              <label class="control-label">Enter Product Name</label>
              <div class="controls">

                  <input type="text" name="product_name" class="span11" placeholder="Enter Product Name">
                </div>

                <div class="control-group">
              <label class="control-label">Select Unit:</label>
              <div class="controls">

               <select class="span11" name="unit">
                
                  <?php
                  $res=mysqli_query($connection, "SELECT * FROM units");
                  while($row=mysqli_fetch_assoc($res)){

                    echo "<option>";
                    echo $row["unit"];
                    echo "</option>";
                  }

                  ?>
               </select>
              
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Enter packaging size</label>
              <div class="controls">

                  <input type="text" name="packaging_size" class="span11" placeholder="Enter Packaging size">
                </div>

           <div class="alert alert-danger" id="" name="error" style="display:none;">
               This Company Already Exist: Please Try Another.
           </div>
 
            <div class="form-actions">
              <button type="submit" name="save" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="" name="success"  style="display:none;">
               Company inserted Successfully.
           </div>

          </form>
        </div>
      </div>

      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Company Name</th>
                  <th>Product Name</th>
                  <th>Unit</th>
                  <th>Packaging Size</th>
                  <th>Edit</th> 
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

              <?php
              $result=mysqli_query($connection, "SELECT * FROM products");
              while($row=mysqli_fetch_assoc($result))
              {
                echo '<tr>
                <td> '.$row['id'].'</td>
                <td> '.$row['company_name'].'</td>
                <td> '.$row['product_name'].'</td>
                <td> '.$row['unit'].'</td>
                <td> '.$row['packaging_size'].'</td>
                <td><a href="edit_products.php?update= '.$row['id'].'">Edit</a></td>
                <td><a href="delete_products.php?delete= '.$row['id'].'">Delete</a></td>
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


