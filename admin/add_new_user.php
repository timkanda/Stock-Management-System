<?php
session_start();

require_once "header.php";
require_once "db_connection.php";



if(isset($_POST["save"])){
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];
$role = $_POST["role"];
  

  $count=0;
  $result=mysqli_query($connection,"SELECT * FROM `user_registration` WHERE username='$username'");
  $count=mysqli_num_rows($result);
  if($count>0){
    ?>
    <script type="text/javascript">
      document.getelementById("success").style.dispaly="none";
    document.getelementById("error").style.dispaly="block";
</script>

<?php
  }else{

    $query="INSERT INTO `user_registration`(`firstname`,`lastname`,`username`,`password`,`role`,`status`) VALUES('$firstname','$lastname','$username','$password','$role','active')";
    if (mysqli_query($connection,$query)){
  
    ?>

    <script type="text/javascript">
      document.getelementById("error").style.dispaly="none";
    document.getelementById("success").style.dispaly="block";
</script>

<?php
      }
  }
}
?>

<div id="content">
    
    <div id="content-header">
        <div id="breadcrumb"><a href="add_new_user.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Add New User</a></div>
    </div>
   
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add new users</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" name="firstname"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name" name="lastname"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">User Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="User name" name="username"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="Enter Password" name="password"  />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Role</label>
              <div class="controls">
                  <select name="role" class="span11">
                      <option>user</option>
                      <option>admin</option>
                  </select>
              </div>
            </div>  
           <div class="alert alert-danger" id="error" style="display:none">
               This Username Already Exist: Please Try Another.
           </div>
 
            <div class="form-actions">
              <button type="submit" name="save" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
               User Name added Successfully.
           </div>

          </form>
        </div>
      </div>

      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name </th>
                  <th>User Name</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

              <?php
              
              $users= "SELECT * FROM user_registration";
              $result= $connection->query($users);
              while($row=$result->fetch_assoc()){
                echo '<tr>
                <td> '.$row['firstname'].'</td>
                <td> '.$row['lastname'].'</td>
                <td> '.$row['username'].'</td>
                <td> '.$row['role'].'</td>
                <td> '.$row['status'].'</td>

                <td><a href="edit_user.php?update= '.$row['id'].'">Edit</a></td>
                <td><a href="delete_user.php?delete= '.$row['id'].'">Delete</a></td>
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


