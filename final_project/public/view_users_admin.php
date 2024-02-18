<?php
require('../includes/connectdb.php');
require('../includes/layouts/header.php');
require('../includes/layouts/navbar_admin.php');
session_start();
?>


<table  class="users">
  <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <?php
$sql="SELECT * FROM `users`";
$result=mysqli_query($connection,$sql);
while($row= mysqli_fetch_assoc($result)){
 
  ?>
  <tbody>
   
    <tr>
      <th scope="row"><?php echo $row['id'] ?> </th>
      <td><?php echo $row['full_name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td>
      

<div class="confirm">  
<form action="view_users_admin.php?id=<?=$row['id']?>" method="POST">
<a  href='view_users_admin.php?id=<?=$row['id']?>'><button class="con"  name='confirm'>Confirm</button></a>
</form>
<form action="view_users_admin.php?id=<?=$row['id']?>" method="POST">
<a  href='view_users_admin.php?id=<?=$row['id']?>'><button class="notcon"  name='notconfirm'>Not confirm</button></a>
</form>

</div>
</td>
    </tr>

  </tbody>
  <?php
}
?>
<?php
$confirm=1;
if(isset($_GET['id'])){
  $id=($_GET['id']);
}else{
   // echo "not valid";
}

if(isset($_POST['confirm'])){

  $sql = "UPDATE `users` SET `status`='$confirm' WHERE `id`='$id'";
  $stmt=mysqli_query($connection,$sql);
  echo "<div class='alerts_add'><div class='success'><p>confirm mode</p></div></div>";

}

$notConfirm=0;
if(isset($_POST['notconfirm'])){

  $sql = "UPDATE `users` SET `status`='$notConfirm' WHERE `id`='$id'";
  $stmt=mysqli_query($connection,$sql);
  echo "<div class='alerts_add'><div class='danger'><p>Not confirm mode</p></div></div>";

}
?>
</table>




<?php
require_once('../includes/layouts/footer.php');
?>