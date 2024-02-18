<?php
require('../includes/connectdb.php');
require('../includes/layouts/header.php');
require('../includes/layouts/navbar_admin.php');
?>

<table  >
  <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">product title</th>
      <th scope="col">product content</th>
      <th scope="col">product price</th>
      <th scope="col">visible</th>
      <th scope="col"  class="lastth">Actions</th>

    </tr>
  </thead>
  <?php
$sql="SELECT * FROM `products`";
$result=mysqli_query($connection,$sql);
while($row= mysqli_fetch_assoc($result)){
 
  ?>
  <tbody>
   
    <tr>
      <td scope="row" class="hash"><?php echo $row['id'] ?> </td>
      <td><img src="../images/<?php echo $row['image'] ?>" alt="photo"></td>
      <td ><?php echo $row['product_title'] ?></td>
      <td class="content"><?php echo $row['product_content'] ?></td>
      <td class="price"><?php echo $row['price'] ?></td>
      <td class="visible"><?php echo $row['visible'] ?></td>
      <td>
        

  <div class="actions">

    <div class="edit">  

    <a  href='edit_product_admin.php?id=<?=$row['id'] ?>'>Edit</a>
    </div>

    <div class="delete">
    <a  href='delete_product_admin.php?id=<?=$row['id']?>'>Delete</a>
    </div>

    </div>

  
      </td>
    </tr>

  </tbody>
  <?php
}
?>
</table>



<?php
include('../includes/layouts/footer.php');
?>  

