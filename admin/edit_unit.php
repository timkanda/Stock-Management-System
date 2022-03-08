<?php
session_start();
require_once "db_connection.php";
include "header.php";
$id = $_GET["update"];
$result= mysqli_query($connection, "SELECT * FROM `units` WHERE id='$id'");
while($row=mysqli_fetch_assoc($result)){
    $unitname = $row["unit"];
    $id=$row["id"];

}
if(isset($_POST["save"])){
  $id=$_GET["update"];
  $name= $_POST["unitname"];
    $update= "UPDATE `units` SET `unit`='$name' WHERE id='$id'";
    $result= mysqli_query($connection,$update);
    if(isset($result)){

      header ("location:add_new_unit.php");
    }else{
      echo "Ooop! something wrong happenned";
    }
     
}
?>
<div id="content">
    
    <div id="content-header">
        <div id="breadcrumb"><a href="edit_unit.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Edit unit</a></div>
    </div>

    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Unit</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Unit Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="unit name" name="unitname" value="<?php echo $unitname;?>"/>
              </div>
            </div>
           
        
 
            <div class="form-actions">
              <button type="submit" name="save" class="btn btn-success">Update</button>
            </div>

            <div class="alert alert-success" id="" name="success"  style="display:none;">
               Unit updated.
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
include "footer.php";
?>