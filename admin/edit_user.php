<?php
session_start();
require_once "db_connection.php";
include "header.php";

$id = $_GET["update"];

$users= "SELECT * FROM user_registration WHERE id='$id'";
$result= $connection->query($users);
while($row=$result->fetch_assoc()){
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $username = $row["username"];
    $password = $row["password"];
    $status = $row["status"];
    $role = $row["role"];

}

if(isset($_POST["save"])){
  $id = $_GET["update"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];
$status = $_POST["status"];
$role = $_POST["role"];


$update= "UPDATE `user_registration` SET `firstname`='$firstname',`lastname`='$lastname',`username`='$username',`password`='$password',`role`='$role',`status`='$status' WHERE id='$id'";
  $result = mysqli_query($connection,$update);
  if(isset($result)){

      header ("location:add_new_user.php");
  }else{
      echo "OOoops!! Update failed !";
  }


}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="edit_user.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Edit user</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit User</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" name="firstname" value="<?php echo $firstname;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name" name="lastname" value="<?php echo $lastname;?>"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">User Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="User name" name="username" required value="<?php echo $username;?>"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="Enter Password" name="password" value="<?php echo $password;?>" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Role</label>
              <div class="controls">
                  <select name="role" class="span11">
                      <option <?php if($role ="user") echo "selected";?>>User</option>
                      <option <?php if($role ="admin") echo "selected";?>>Admin</option>
                  </select>
              </div>
            </div>  

            <div class="control-group">
              <label class="control-label">Select Status</label>
              <div class="controls">
                  <select name="status" class="span11">
                      <option <?php if($status ="active") echo "selected";?> >Active</option>
                      <option <?php if($status ="inactive") echo "selected";?>>Inactive</option>
                  </select>
              </div>
            </div> 
        
 
            <div class="form-actions">
              <button type="submit" name="save" class="btn btn-success">Update</button>
            </div>

            <div class="alert alert-success" id="" name="success"  style="display:none;">
               User updated Successfully.
           </div>

          </form>
        </div>
</div>
        </div>

    </div>
</div>
<?php


?>

<?php
include "footer.php";
?>