<?php
session_start();

require_once "header.php";
require_once "db_connection.php";

$id=$_GET["update"];
$productcompany ="";
$productname = "";
$productunit ="";
$productquantity ="";
$productprice ="";


$result=mysqli_query($connection, "SELECT * FROM `stock` WHERE id='$id'");
while($row=mysqli_fetch_assoc($result)){
$productcompany =$row["product_company"];
$productname = $row["product_name"];
$productunit =$row["product_unit"];
$productquantity =$row["product_quantity"];
$productprice =$row["product_price"];
}


if(isset($_POST["save"])){
$id = $_GET["update"];
$productprice =$_POST["product_price"];

$updatequery= "UPDATE `stock` SET `product_price`='$productprice' WHERE id='$id'";
$update=mysqli_query($connection, $updatequery);

if (isset($update)){

  echo "<script>
  alert('product updated');
  window.location.href='manage_stock.php';
  </script>";
}else{
  echo "update failed";
}
}

?> 

<div id="content">
   
    <div id="content-header">
        <div id="breadcrumb"><a href="edit_stock.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Edit Stock</a></div>
    </div>
    
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Stock</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="" method="post" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Product company:</label>
              <div class="controls">

                <input type="text" name="product_company" class="span11" value="<?php echo $productcompany;?>" readonly>
                </div>
        
            </div>
              
            <div class="control-group">
              <label class="control-label">Product Name</label>
              <div class="controls">

                  <input type="text" name="product_name" class="span11" placeholder="Product Name" value="<?php echo $productname;?>"readonly>
                </div>

            <div class="control-group">
              <label class="control-label">Product Unit</label>
              <div class="controls">

                  <input type="text" name="product_unit" class="span11" placeholder="Unit" value="<?php echo $productunit; ?>" readonly>
                </div>

                <div class="control-group">
              <label class="control-label">Product Quantity</label>
              <div class="controls">

                  <input type="text" name="product_quantity" class="span11" placeholder="Qty" value="<?php echo $productquantity; ?>" readonly>
                </div>

                <div class="control-group">
              <label class="control-label">Product Price</label>
              <div class="controls">

                  <input type="text" name="product_price" class="span11" placeholder="price" value="<?php echo $productprice; ?>">
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


