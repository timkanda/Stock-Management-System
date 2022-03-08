<?php
session_start();

require_once "header.php";
require_once "db_connection.php";



if(isset($_POST["save"])){

  $firstname = $_POST['firstname'];
$lastname = $_POST["lastname"];
$businessname = $_POST["businessname"];
$contact = $_POST["contact"];
$address = $_POST["address"];
$city = $_POST["city"];

    $query="INSERT INTO `party_info`(`firstname`,`lastname`,`businessname`,`contact`,`address`,`city`) VALUES('$firstname','$lastname','$businessname','$contact','$address','$city')";
      if (mysqli_query($connection,$query)){
      
          echo "User Successfully Added!";

        }else{
          echo "Ooops! Something Wrong happenned!";
        }
        
  }

?>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="add_new_party.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Add New Party</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add new Party</h5>
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
              <label class="control-label">Business Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Business name" name="businessname"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Contact</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="contact" name="contact"  />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Address</label>
              <div class="controls">
                  <textarea class="span11" name="address"></textarea>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">City</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="city" name="city"/>
              </div>
            </div>
 
            <div class="form-actions">
              <button type="submit" name="save" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="" name="success"  style="display:none;">
               User Name inserted Successfully.
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
                  <th>Business Name</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>City</th>

                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

              <?php
              // $selectquery=mysqli_query($connection, "SELECT * FROM user_registration");
          
              // while($row=mysqli_fetch_assoc($selectquery))
              $users= "SELECT * FROM party_info";
              $result= $connection->query($users);
              while($row=$result->fetch_assoc()){
                echo '<tr>
                <td> '.$row['firstname'].'</td>
                <td> '.$row['lastname'].'</td>
                <td> '.$row['businessname'].'</td>
                <td> '.$row['contact'].'</td>
                <td> '.$row['address'].'</td>
                <td> '.$row['city'].'</td>

                <td><a href="edit_party.php?update= '.$row['id'].'">Edit</a></td>
                <td><a href="delete_party.php?delete= '.$row['id'].'">Delete</a></td>
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


