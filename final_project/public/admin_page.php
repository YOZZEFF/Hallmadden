<?php
require('../includes/connectdb.php');
require('../includes/layouts/header.php');
require('../includes/layouts/navbar_admin.php');
    
?>

<div class="card">
    <div class="title">
        <h1>welcome to control panel</h1>
        <p>Here are the tools  which you can do more of the action you need</p>
    </div>
    <div class="tools">
        <a href="add_product.php">Add Product</a>
        <a href="view_products_admin.php">View Products</a>
        <a href="view_users_admin.php">View users account</a>
        <a href="view_feedback_admin.php">View Feedback</a>
    </div>
</div>
<?php
include('../includes/layouts/footer.php');
?>