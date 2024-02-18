<?php
require('../includes/connectdb.php');
require('../includes/layouts/header.php');
require('../includes/layouts/navbar_admin.php');
$pro_id=($_GET['id']);
?>


    <?php
    $sql = "SELECT * FROM `products` WHERE `id`='$pro_id' ";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if (isset($_POST['submit'])) {
        $image = $_POST['image'];
        $product_title = $_POST['title'];
        $price = $_POST['price'];
        $visible = $_POST['visible'];
        $product_content = $_POST['content'];
       if($row['image']==$image &&$row['product_title']==$product_title &&$row['price']==$price &&$row['visible']==$visible &&$row['product_content']==$product_content ){
        echo "<div class='alerts_add'><div class='danger'><p>Not Any Changes Happend</p></div></div>";
       }else{
       
    

$sql ="UPDATE `products` SET `image`= '$image',`product_title`= '$product_title',`price` ='$price',`visible`='$visible',
`product_content`='$product_content' 
        WHERE `id`='$pro_id' ";

        $stmt = mysqli_query($connection, $sql);

        echo "<div class='alerts_add'><div class='success'><p>Updated Successfully.</p></div></div>";
        }
      }
    
    ?>

<div class="container_add">

<form  method="POST" action="edit_product_admin.php?id=<?=$row['id'] ?>" >
   <h2>Edit A Product</h2>
  <div class="formshape_add">
    <label >image (path/url)</label>
    <input type="text"  name="image"  value="<?php echo $row['image']?>">
    </div>
 
  <div class="formshape_add">
    <label >Product Title</label>
    <input type="text" name="title"  value="<?php echo $row['product_title']?>" >
  </div>
  <div class="formshape_add">
    <label >Product Content</label>
   <textarea name="content" type="text" cols="30" rows="5"><?php echo $row['product_content']?></textarea>
  </div>
  <div class="formshape_add">
    <label >Price</label>
    <input type="text" name="price"  value="<?php echo $row['price']?>">
  </div>
  <div class="formshape_add">
    <label >visible</label>
    <input type="text" name="visible"  value="<?php echo $row['visible']?>">
  </div>

   <div class="formshape_add">
  <button type="submit" value="submit" name="submit">Update</button>
      </div>

</form>
</div>



<?php
require_once('../includes/layouts/footer.php');
?>