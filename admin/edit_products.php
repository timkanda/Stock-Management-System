<?php
session_start();

require_once "header.php";
require_once "db_connection.php";

$id=$_GET["update"];
$companyname ="";
$productname = "";
$unit ="";
$packagingsize ="";


$result=mysqli_query($connection, "SELECT * FROM `products` WHERE id='$id'");
while($row=mysqli_fetch_assoc($result)){
$companyname = $row["company_name"];
$productname = $row["product_name"];
$unit = $row["unit"];
$packagingsize = $row["packaging_size"];

}
if(isset($_POST["save"])){
$id = $_GET["update"];


$companyname = $_POST["company_name"];
$productname = $_POST["product_name"];
$unit = $_POST["unit"];
$packagingsize = $_POST["packaging_size"];
$updatequery= "UPDATE `products` SET `company_name`='$companyname',`product_name`='$productname',`unit`='$unit',`packaging_size`='$packagingsize' WHERE id='$id'";
$update=mysqli_query($connection, $updatequery);




if (isset($update)){

  echo "<script>
  alert('product updated');
  window.location.href='add_products.php';
  </script>";
}else{
  echo "update failed";
}
}

?> 

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="edit_products.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Edit Products</a></div>
    </div>
   
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Products</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="" method="post" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Select company:</label>
              <div class="controls">

               <select class="span11" name="company_name" value="">
                  
                
                  
               <?php
                  $result=mysqli_query($connection, "SELECT * FROM company_name");
                  while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <option <?php if($row["comp_name"]==$companyname) '[echo "selected"]';?>>
                    <?php

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

                  <input type="text" name="product_name" class="span11" placeholder="Enter Product Name" value="<?php echo $productname;?>">
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

                  <input type="text" name="packaging_size" class="span11" placeholder="Enter Packaging size" value="<?php echo $packagingsize; ?>">
                </div>

           <div class="alert alert-danger" id="" name="error" style="display:none;">
               This Company Already Exist: Please Try Another.
           </div>
 
            <div class="form-actions">
              <button type="submit" name="save" class="btn btn-success">Update</button>
            </div>

            <div class="alert alert-success" id="" name="success"  style="display:none;">
               Product Updated Successfully.
           </div>

          </form>
        </div>
      </div>
                

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


