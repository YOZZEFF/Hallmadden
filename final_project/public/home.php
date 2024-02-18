<?php
require('../includes/connectdb.php');
require('../includes/layouts/header.php');
require('../includes/layouts/navbar_user.php');
?>
  
   
        <!-- navbar here -->
       
    <!-- start section one -->
        <div class="section_one">

            <img src="../images/background.jpg" alt="background">
       
            
            <div class="words">
            <p><span>Style is a way</span> to say Who are you  without Having to speak</p>
             </div>
        </div>
        <!-- end section one -->
        <?php
        $sql = "SELECT * FROM `products`";
        $resault = mysqli_query($connection, $sql);
        ?>
       
        <!-- start section two -->
        <div class="section_two">
        <?php
        
        while ($row = mysqli_fetch_assoc($resault)) {
        ?>
            <div class="child">
                <img src="../images/<?php echo $row['image'] ?>" alt="picture">
                <p><?php echo $row['product_title'] ?></p>
                <span><?php echo $row['price'] ?></span>
                <a href="show_product.php?id=<?=$row['id'] ?>">check now</a>
            </div>

<?php
}
?>
       
        </div>
        
    </div>
        <!-- end section two -->
   
    <!-- start footer -->
    <footer>
        <div class="section_three">
            <div class="child one">
                <h3>Hall Madden</h3>
                <p>Hall Madden is a website for showing our products of the women's clothes and to make shopping more easy,more efficent and more easier.</p>

            </div>
            <div class="child two">
               
                <h3>Join Our & Sign Up </h3>
                <form action="home.php" method="POST">
                <input type="email"  name="email" placeholder=" email@example.com">
                <button type="submit" name="sign_up">Sign Up</button>
                <?php
                if(isset($_POST['sign_up'])){
                    echo "<P class='sign_up'>Thanks for signing up! Please keep an eye out for our confirmation email.</p>";
                }


                ?>
            </form>
            </div>

            <div class="child three">
                <h3>Get In Touch</h3>
                <p>Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879.</p>
            </div>


            </div>
         
        </footer>
       
<?php
include('../includes/layouts/footer.php');
?>