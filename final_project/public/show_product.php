<?php
require_once('../includes/connectdb.php');
require_once('../includes/layouts/header.php');
require_once('../includes/layouts/navbar_user.php');
$product_id = ($_GET['id']);
?>

    <?php
    $sql = "SELECT * FROM `products` WHERE `id` = '$product_id' ";
    $resault = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($resault,MYSQLI_ASSOC);
    ?>
    <div class="parent">
        <img src="../images/<?php echo $row['image'] ?>" alt="">
        <div class="content">
            <h1><?php echo $row['product_title']?></h1>
            <p><?php echo $row['price']?></p>
            <p><?php echo $row['product_content']?></p>
            <a href="home.php">back to home page</a>
        </div>
    </div>
<?php
include('../includes/layouts/footer.php');
?>