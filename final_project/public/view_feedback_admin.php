<?php
require('../includes/connectdb.php');
require('../includes/layouts/header.php');
require('../includes/layouts/navbar_admin.php');
session_start();
?>


<table class="feedbacks">
    <thead>
        <tr>
            <th scope="col">Full Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Masseges</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <?php
    //to get user  name and his  massege 
    $sql = "SELECT * FROM `contact_us`  LEFT  JOIN `users` ON    users.id = contact_us.user_id  ";
    $result = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>

        <tbody>
            <tr>
                <td><?php echo $row['full_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td class="masseg"><?php echo $row['massege'] ?></td>
                <td>
                    <div class="displaying">
                        <form action='view_feedback_admin.php?mid=<?= $row['mid'] ?>' method="POST">
                            <a href='view_feedback_admin.php?mid=<?= $row['mid'] ?>'><button class="con" name="display">Display</button></a>
                        </form>
                        <form action='view_feedback_admin.php?mid=<?= $row['mid'] ?>' method="POST">
                            <a href='view_feedback_admin.php?mid=<?= $row['mid'] ?>'><button class="notcon" name="notDisplay">Not Display</button></a>
                        </form>

                    </div>



                </td>
            </tr>
        </tbody>
    <?php
    }
    ?>
    <?php
    if (isset($_GET['mid'])) {
        $id = ($_GET['mid']);
    } else {
        // echo "not valid";
    }

    if (isset($_POST['display'])) {


        $display = 1;
        $sql = "UPDATE `contact_us` SET `status`='$display' WHERE `mid`='$id'";
        $stmt = mysqli_query($connection, $sql);
    }
    if (isset($_POST['notDisplay'])) {

        $notDisplay = 0;
        $sql = "UPDATE `contact_us` SET `status`='$notDisplay' WHERE `mid`='$id'";
        $stmt = mysqli_query($connection, $sql);
    }

    ?>
</table>
<?php
require_once('../includes/layouts/footer.php');
?>