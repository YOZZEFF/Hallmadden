<?php
require('../includes/connectdb.php');
require('../includes/layouts/header.php');
require('../includes/layouts/navbar_user.php');  

session_start();
if (!isset($_SESSION['user'])) {
    header('location: login.php');
} else {

    $user_id = $_SESSION['user_id'];
    $_SESSION['profile']='yes';
}
?>

<!--   this query to  display user information extend on id user in above ($_SESSION)  we start session 
in register and store id in session to use it in this page-->
<?php
$sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

?>
<div class="alerts">
<?php

if (isset($_POST['update'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashPassword= password_hash($password,PASSWORD_DEFAULT);
    $errors = array(); 
    $password_2=$row['password'];
    $name=$full_name;
    if($row['full_name'] ==$full_name || $row['email']==$email || password_verify($password,$row['password'])){
      echo "<div class='alerts_add'><div class='danger'><p>All Fields Are Required</p></div></div>";

    }else{

       

        $sql="UPDATE `users` SET `full_name`='$full_name',`email`='$email',`password`='$hashPassword' WHERE 
        `id`='$user_id' ";
        $stmt=mysqli_query($connection,$sql);
        echo "<div class='alerts_add'><div class='success'><p>Updated successfully</p></div></div>";
    }
     }
      




?>
</div>
    
   <div class="form_profile">
    <form method="POST" action="profile.php">
    <h1>Profile</h1>
    <div class="formshape_2">
      <label>Email address : </label>
      <input type="email" name="email"  value="<?php echo $row['email'];?>">
    </div>
    <div class="formshape_2">
      <label>Full name : </label>
      <input type="text" name="full_name"  value="<?php echo $row['full_name'];?>">
    </div>

    <div class="formshape_2">
      <label>Password : </label>
      <?php
      $pass='*********';
      ?>
      <input type="password" name="password" value="<?php echo $pass; ?>">
    </div>

    <div class="formshape_2">
      <button type="submit" value="update" name="update">Update</button>
     
    </div>
    </div>
  </form>
<?php
include('../includes/layouts/footer.php');
?>
