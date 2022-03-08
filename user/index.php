
<?php
require_once "db_connection.php";
session_start();
?>

<!DOCTYPE html> 
<html lang="en">

<head>
    <title>Stock Management System</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/matrix-login.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body> 
<div id="loginbox">
    <form class="form-vertical" action="#" method="post">
        <div class="control-group normal_text"><h3>User Login</h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text"
                                                                                       placeholder="Username" name="username" required>
                </div>
            </div> 
        </div> 
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password"
                                                                                     placeholder="Password" name="password" required>
                </div>
            </div>
        </div>
        <div class="form-actions">
            
            <input name="submit1" type="submit" value="login" class="btn btn-success">
        
        </div>
    </form>
 <?php
if(isset($_POST["submit1"])){
    $username= $_POST["username"];
    $password=$_POST["password"];

    
    $sql="SELECT * FROM `user_registration` WHERE username='$username' AND password='$password' AND status='active' AND role='user'";
    $result=mysqli_query($connection,$sql);

    $count=mysqli_num_rows($result);
    
    if($count>0){
        $_SESSION["user"]=$username;

        ?>
        <script type="text/javascript">
    window.location="dashboard.php";
</script>
        <?php
    }else{
        ?>
        <div class="alert alert-danger">
            Invalid Username or Passoword!
        </div>
       <?php
    }    
}
 ?>
 
</div>

<script src="js/jquery.min.js"></script>
<script src="js/matrix.login.js"></script>
</body>

</html>