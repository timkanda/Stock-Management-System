<?php
session_start();


require_once "header.php";
require_once "db_connection.php";



if(isset($_POST["save"])){
  $companyname = $_POST["company_name"];
  $productname = $_POST["product_name"];
  $unit = $_POST["unit"];
  $packagingsize = $_POST["packaging_size"];
  $quantity = $_POST["quantity"];
  $price = $_POST["price"];
  $partyname = $_POST["party_name"];
  $paymentmethod = $_POST["payment_method"];
  $expirydate = $_POST["expiry_date"];

  $productcompany=$_POST["company_name"];
  $productunit=$_POST["unit"];


  $insertquery="INSERT INTO `manage_purchase`(`id`, `company_name`, `product_name`, `unit`, `packaging_size`, `quantity`, `price`, `party_name`, `payment_method`, `expiry_date`) VALUES ('NULL','$companyname','$productname','$unit','$packagingsize','$quantity','$price','$partyname','$paymentmethod','$expirydate')";
  
  $insertstock= "INSERT INTO `stock`(`product_company`, `product_name`, `product_unit`, `product_quantity`, `product_price`) VALUES ('$companyname',' $productname','$unit','$quantity','$price')";
  $savestock=mysqli_query($connection,$insertstock);
  
  $save=mysqli_query($connection,$insertquery);
  if($save){

    echo "purchase made";
  }
  
  if($savestock){
    echo "stock added";
  }
 

}

?> 

<div id="content">
   
    <div id="content-header">
        <div id="breadcrumb"><a href="manage_products.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            New Purchase</a></div>
    </div>
   
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Make a Purchase</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="" method="post" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Select company:</label>
              <div class="controls">

               <select class="span11" name="company_name" id="company_name" onchange="select_company(this.value)">
                  
                
                  
                  <?php
                  $res=mysqli_query($connection, "SELECT * FROM company_name");
                  while($row=mysqli_fetch_assoc($res)){

                    echo "<option>";
                    echo $row["comp_name"];
                    echo "</option>";
                  }

                  ?>
               </select>
              </div>
            </div>
              
            <div class="control-group">
              <label class="control-label">Select Product name</label>
              <div class="controls" id="product_name">
                  <select class="span11" name="product_name">
                  <?php
                  $res=mysqli_query($connection, "SELECT * FROM products");
                  while($row=mysqli_fetch_assoc($res)){

                    echo "<option>";
                    echo $row["product_name"];
                    echo "</option>";
                  }

                  ?>

            
                  </select>
                </div>
                </div>

                <div class="control-group">
              <label class="control-label">Select Unit:</label>
              <div class="controls" id="unit">

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
              <div class="controls" id="packaging_size">
              <select class="span11" name="packaging_size">

              <?php
                  $res=mysqli_query($connection, "SELECT * FROM products");
                  while($row=mysqli_fetch_assoc($res)){

                    echo "<option>";
                    echo $row["packaging_size"];
                    echo "</option>";
                  }

                  ?>
                  <!-- <option>Select</option> -->

               </select>
            </div>
            </div>

            <div class="control-group">
              <label class="control-label">Enter Quantity</label>
              <div class="controls">
              <input type="text" name="quantity" value="0" class="span11">
            </div>

            <div class="control-group">
              <label class="control-label">Enter Price</label>
              <div class="controls">
              <input type="text" name="price" value="0" class="span11">
            </div>

            <div class="control-group">
              <label class="control-label">Select party name</label>
              <div class="controls">
              <select class="span11" name="party_name">
              <?php
                  $res=mysqli_query($connection, "SELECT * FROM party_info");
                  while($row=mysqli_fetch_assoc($res)){

                    echo "<option>";
                    echo $row["businessname"];
                    echo "</option>";
                  }

                  ?>
                  <option>Select</option>
               </select>
            </div>
            </div>

            <div class="control-group">
              <label class="control-label">payment method</label>
              <div class="controls">
              <select class="span11" name="payment_method">
                  <option>Cash</option>
                  <option>Debit Card</option>
                  <option>Visa card</option>
                  <option>Paypal</option>
               </select>
            </div>
            </div>

            <div class="control-group">
              <label class="control-label">Expiry date</label>
              <div class="controls">
              <input type="text" name="expiry_date" value="" class="span11" placeholder="YYYY-MM-dd" required pattern="\d(4)-\\d(2)-\\d(2)-\">
            </div>
            </div>

                <div class="form-actions">
              <button type="submit" name="save" class="btn btn-success">Purchase Now</button>
            </div>

            <div class="alert alert-success" id="" name="success"  style="display:none;">
               Purchase made!.
           </div>

          </form>
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


