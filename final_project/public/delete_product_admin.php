<?php
require('../includes/connectdb.php');
require('../includes/layouts/header.php');
?>


<?php
$pro_id=($_GET['id']);
$sql="DELETE FROM `products` WHERE `id`='$pro_id'";
$stmtDelete = mysqli_query($connection,$sql);
header('location: view_products_admin.php');




?>




<?php
require_once('../includes/layouts/footer.php');
?>