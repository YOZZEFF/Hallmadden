<?php
require('../includes/connectdb.php');
require('../includes/layouts/header.php');
require('../includes/layouts/navbar_admin.php');
?>

<?php
    if (isset($_POST['submit'])) {
        $image = $_POST['image'];
        $product_title = $_POST['title'];
        $price = $_POST['price'];
        $visible = $_POST['visible'];
        $product_content = $_POST['content'];
        $errors = array();
        if (empty($image) or empty($product_title) or empty($price) or empty($visible) or empty($product_content)) {
            array_push($errors, 'all fields are required');
        }
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alerts_add'><div class='danger'><p>$error</p></div></div>";
            } 
        } else {
            $sql = "INSERT INTO products(image,product_title,product_content,price,visible) VALUES(?,?,?,?,?)";
            $stmt = mysqli_stmt_init($connection);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,'sssss',$image,$product_title,$product_content,$price,$visible);
                mysqli_stmt_execute($stmt);
                echo "<div class='alerts_add'><div class='success'><p>$error</p></div></div>";
            }
        }
    }

    ?>
    
    <div class="container_add">

<form  method="POST" action="add_product.php" >
   <h2>Add A Product</h2>
  <div class="formshape_add">
    <label >image (path/url)</label>
    <input type="text"  name="image"  >
    </div>
 
  <div class="formshape_add">
    <label >Product Title</label>
    <input type="text" name="title"   >
  </div>
  <div class="formshape_add">
    <label >Product Content</label>
   <textarea name="content" type="text" cols="30" rows="5"></textarea>
  </div>
  <div class="formshape_add">
    <label >Price</label>
    <input type="text" name="price"  >
  </div>
  <div class="formshape_add">
    <label >visible</label>
    <input type="text" name="visible"  >
  </div>

   <div class="formshape_add">
  <button type="submit" value="submit" name="submit">Add</button>
      </div>

</form>
</div>




<?php
include('../includes/layouts/footer.php');
?>