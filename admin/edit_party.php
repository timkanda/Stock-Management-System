<?php
session_start();

require_once "header.php";
require_once "db_connection.php";
$id = $_GET['update'];

$query= "SELECT * FROM `party_info` WHERE id='$id'";
$result = $connection->query($query);
while($row=$result->fetch_assoc()){
  $firstname = $row["firstname"];
  $lastname = $row["lastname"];
  $businessname = $row["businessname"];
  $contact = $row["contact"];
  $address = $row["address"];
  $city = $row["city"];
  $id = $row["id"];
}

if(isset($_POST["save"])){
  

  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $businessname = $_POST["businessname"];
  $contact = $_POST["contact"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  
  
      $update= "UPDATE `party_info` SET `firstname`='$firstname',`lastname`='$lastname',`businessname`='$businessname',`contact`='$contact',`address`='$address',`city`='$city' WHERE id='$id'";
      
      $result = mysqli_query($connection,$update);
      if(isset($result)){
  
          header ("location:add_new_party.php");
      }else{
          echo "OOoops!! Update failed !";
      }
  }

?>

<div id="content">
    
    <div id="content-header">
        <div id="breadcrumb"><a href="edit_party.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Edit Party Info</a></div>
    </div>
   
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Party</h5>
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
              <label class="control-label">Business Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Business name" name="businessname" value="<?php echo $businessname;?>"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Contact</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="contact" name="contact" value="<?php echo $contact;?>"  />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Address</label>
              <div class="controls">
                  <textarea class="span11" name="address">
                  </textarea>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">City</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="city" name="city" value="<?php echo $city;?>" />
              </div>
            </div>
 
            <div class="form-actions">
              <button type="submit" name="save" class="btn btn-success">Update</button>
            </div>

            <div class="alert alert-success" id="" name="success"  style="display:none;">
               Party Info edited Successfully.
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


