<?php
require('../includes/connectdb.php');
require('../includes/layouts/header.php');
require('../includes/layouts/navbar_user.php');
include('admin_login.php');
if (isset($_SESSION['user'])) {
  header('location: home.php');
}
?>
  
  <?php


  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE `email`='$email' ";
    $resault = mysqli_query($connection, $sql);
    $user = mysqli_fetch_assoc($resault);
     $errors =array();
    
    if ($user) {
        if (password_verify($password, $user['password'])) {

          $sql_appending="SELECT * FROM users WHERE `email`='$email' ";
          $resault_2=mysqli_query($connection,$sql_appending);
          $user_append=mysqli_fetch_assoc($resault_2);
          $append = $user_append['status'];
         
          if ($append == 0) {
            array_push($errors,'your account is appending');
          } 
          else{
          
          $_SESSION['user'] = 'yes';
          $_SESSION['user_id'] = $user['id'];
          header('Location: home.php');
          die();
          }
        
        } else {
          array_push($errors,'password does not match');

        }
      
    } else {
      array_push($errors,'email does not match');

    }


    if( count($errors)>0){
      foreach($errors as $error)
      echo "<div class='alerts_add'><div class='danger'><p>$error</p></div></div>";
    }
    // there's a prpblem here when i access value none what is the reason ????
  }

  ?>




<div class="parent">

 


  <form method="POST" action="login.php">
    <h2>Login in</h2>
    <div class="formshape">
      <label>Email address</label>
      <input type="email" name="email" class="form-control" placeholder=" Joe@email.com">
    </div>

    <div class="formshape">
      <label>Password</label>
      <input type="password" name="password" class="form-control" placeholder=" Enter your password">
    </div>

    <div class="formshape">
      <button type="submit" value="login" name="login">Login</button>
      <div class="register">
        <a href="registration.php"> Click Here</a>
        <p>..Register here if you don't
        <p>
      </div>
     
    </div>
  </form>
</div>
<?php
require_once('../includes/layouts/footer.php');
?>