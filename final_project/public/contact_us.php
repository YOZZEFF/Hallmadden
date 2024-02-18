<?php
require('../includes/connectdb.php');
require('../includes/layouts/header.php');
require('../includes/layouts/navbar_user.php');
session_start();
if (!isset($_SESSION['user'])) {
  header('location: login.php');
} else {
$userr_id= $_SESSION['user_id'];
}
?>

<?php
if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $massege=$_POST['massege'];
    $errors=array();


  
    if(empty($name) OR empty($email) OR empty($massege)){

        array_push($errors,'all fields are required');
    }
  
// to check on the email in feedback 
$sql="SELECT * from `users` WHERE `email`='$email' AND `full_name`='$name' AND `id`='$userr_id'";
$result=mysqli_query($connection,$sql);
$row= mysqli_fetch_assoc($result);
if(!$row){
    array_push($errors,'email does not match');

}
    if(count($errors)>0){
        foreach($errors as $error){
            echo "<div class='alerts_add'><div class='danger'><p>$error</p></div></div>";


        }

    }else{
          $status=0;
    $sql="INSERT INTO `contact_us`(user_id,massege,status) VALUES(?,?,?)";
    $stmt=mysqli_stmt_init($connection);
    $preparestmt=mysqli_stmt_prepare($stmt,$sql);
    if($preparestmt){
        mysqli_stmt_bind_param($stmt,'isi',$userr_id,$massege,$status);
        mysqli_stmt_execute($stmt);

        echo "<div class='alerts_add'><div class='success'><p>your feedback sent successfuly</p></div></div>";

    
    }
} 

}
?>
<div class="container">
    <div class="childs">

        <div class="child">
            <img src="../images/maps-and-flags.png" alt="location">
            <h3>OUR MAIN OFFICE</h3>
            <p>our location 8th floor,379 Hudson St,New York,NY 10018 </p>
        </div>

        <div class="child">
        <img src="../images/telephone-call.png" alt="call">
        <h3>PHONE NUMBER</h3>
        <p> (+1) 96 716 6879.</p>
        </div>

        <div class="child">
        <img src="../images/fax.png" alt="fax">
        <h3>FAX</h3>
        <P>1-234-567-8900</P>
        </div>

        <div class="child">
        <img src="../images/email.png" alt="email">
        <h3>EMAIL</h3>
        <P>HallMadden@gmail.com</P>
        </div>
    </div>

    <form  method="POST" action="contact_us.php" >
   <h2>Contact Us</h2>
  <div class="formshape_add">
    <label >Full Name</label>
    <input type="text"  name="name"  placeholder=" enter your name">
    </div>
 
  <div class="formshape_add">
    <label >E-Mail</label>
    <input type="email" name="email"   placeholder=" enter your Email">
  </div>
  <div class="formshape_add">
    <label >Massege</label>
   <textarea name="massege" type="text" cols="30" rows="5"></textarea>
  </div>
  
   <div class="formshape_add">
  <button type="submit" value="submit" name="submit">submit</button>
      </div>

</form>
</div>


<?php
include('../includes/layouts/footer.php');
?>