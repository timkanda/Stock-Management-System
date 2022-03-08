<?php
session_start();

require_once "header.php";
require_once "db_connection.php";
$id = $_GET["update"];

$name= $_GET["comp_name"];

$editcompany= "SELECT * FROM `company_name` WHERE id='$id'";
$result= $connection->query($editcompany);
while($row=$result->fetch_assoc()){
  $name=$row["comp_name"];
}


if(isset($_POST["save"])){
  $id=$_GET["update"];
  $name= $_POST["comp_name"];
    $update= "UPDATE `company_name` SET `comp_name`='$name' WHERE id='$id'";
    $result= mysqli_query($connection,$update);
    if(isset($result)){

      header ("location:add_new_company.php");
    }else{
      echo "Ooop! something wrong happenned";
    }
     
}

?>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="edit_company.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Edit Company</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Company</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="company name" name="comp_name" value="<?php echo $name;?>"/>
              </div>
            </div>
 
            <div class="form-actions">
              <button type="submit" name="save" class="btn btn-success">Update</button>
            </div>

            <div class="alert alert-success" id="" name="success"  style="display:none;">
               Company updated Successfully.
           </div>

          </form>
        </div>
      </div>          
      
    </div>
        </div> 

    </div>
</div>


<?php
require_once "footer.php";
?>


