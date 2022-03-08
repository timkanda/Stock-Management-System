<?php
session_start();

require_once "header.php";
require_once "db_connection.php";


if(isset($_POST["save"])){

  $unitname = $_POST['unitname'];
  $duplicate=mysqli_query($connection,"SELECT * FROM `units` WHERE unit='$unitname'");
  if (mysqli_num_rows($duplicate) > 0){
    
    echo "Unit Name Already Exist";
  }else{
    $query="INSERT INTO `units` VALUES('Null','$unitname')";
      if (mysqli_query($connection,$query)){
      
          echo "Unit Successfully Added!";

        }else{
          echo "Ooops! Something Wrong happenned!";
        }
        
      }
  }

?>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="add_new_unit.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Add New Unit</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add new unit</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Unit Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Unit name" name="unitname"/>
              </div>
            </div>
              
           <div class="alert alert-danger" id="" name="error" style="display:none;">
               This Unit Already Exist: Please Try Another.
           </div>
 
            <div class="form-actions">
              <button type="submit" name="save" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="" name="success"  style="display:none;">
               Unit inserted Successfully.
           </div>

          </form>
        </div>
      </div>

      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Unit Name</th>

                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

              <?php
              
              $units= "SELECT * FROM units";
              $result= $connection->query($units);
              while($row=$result->fetch_assoc()){
                echo '<tr>
                <td> '.$row['id'].'</td>
                <td> '.$row['unit'].'</td>
                <td><a href="edit_unit.php?update= '.$row['id'].'">Edit</a></td>
                <td><a href="delete_unit.php?delete= '.$row['id'].'">Delete</a></td>
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


