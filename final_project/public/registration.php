<?php
require('../includes/connectdb.php');
require('../includes/layouts/header.php');
require('../includes/layouts/navbar_user.php');

// include('admin_login.php');
if(isset($_SESSION['user'])){
    header('location: home.php');
}
?>

<div class="alerts">

<?php
 
if(isset($_POST['submit'])){

$full_name=$_POST['full_name'];
$email=$_POST['email'];
$password=$_POST['password'];
$repeat_password=$_POST['repeat_password'];
$hashpassword=password_hash($password,PASSWORD_DEFAULT);


$errors= array();

if(empty($full_name) OR empty($email) OR empty($password) OR empty($repeat_password)){
  array_push($errors, "All fields are required");
  
  
}
 else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
  array_push($errors,"email is not valid");
}
else if(strlen($password)<8){
  array_push($errors,"password must be at least 8 charchtes long");
}
else if($password!==$repeat_password){
  array_push($errors,"password does not match");
}

$sql="SELECT * FROM users WHERE `email`='$email'";
$resault=mysqli_query($connection,$sql);
$rowCount=mysqli_num_rows($resault);
if($rowCount>0){

  array_push($errors,"email already exists");
}
  if(count($errors)>0){
    foreach($errors as $error){
      echo "<div class='alerts_add'><div class='danger'><p>$error</p></div></div>";

    }
  }
else{

$sql="INSERT INTO users(full_name,email,password) VALUES (?,?,?)";
$stmt= mysqli_stmt_init($connection);
$prepareStmt= mysqli_stmt_prepare($stmt,$sql);
if($prepareStmt){
  mysqli_stmt_bind_param($stmt,'sss',$full_name,$email,$hashpassword);
  mysqli_stmt_execute($stmt);
  echo "<div class='alerts_add'><div class='success'><p>Your Account Is Apending</p></div></div>";
  // header('Location: login.php');

}else{
  die('something wrong');
}
}
}
?>
</div>
<div class="parent">

<div class="title_reg">
    <h2>HallMadden</h2>
    <p>you're welcome in our shop</p>
</div>

<form  method="POST" action="registration.php" >
   <h2>Registration</h2>
  <div class="formshape">
    <label >full_name</label>
    <input type="text"  name="full_name"  placeholder=" Enter your name">
    </div>
 
  <div class="formshape">
    <label >Email Address</label>
    <input type="email" name="email"   placeholder=" Enter your email">
  </div>
  <div class="formshape">
    <label >Password</label>
    <input type="password" name="password"   placeholder=" Enter your password">
  </div>
  <div class="formshape">
    <label >Repeat Password</label>
    <input type="password" name="repeat_password"   placeholder=" Enter your Password again">
  </div>

   <div class="formshape">
  <button type="submit" value="submit" name="submit">Submit</button>
      </div>

</form>
</div>

<?php
include('../includes/layouts/footer.php');
?>