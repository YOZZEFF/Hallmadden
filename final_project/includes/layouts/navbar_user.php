

<nav>
    <div class="navbar">
        <div class="logo">
            <p>Hall<span>Madden</span></p>
        </div>
        <!-- burger icon -->
        <img src="../images/burger_icon.png" alt="icon" id="burger">

            <div class="icon" >
                <p id="closing">x</p>
           <ul>
                <a href="home.php">Home</a>
                <a href="about.php">About</a>
                <a href="contact_us.php">Contact</a>
                <?php 
                session_start();
                if(isset($_SESSION['user'])){
                    echo "<a  href='profile.php'>Profile</a>";
                    echo "<a href='logout.php'>Logout</a>";

                }
                else{
                    echo "<a href='Login.php'>Login</a>";
                }
                          ?>

                
            </ul>
           
        </div>
     
        <div class="links">
            <ul>
                
                <a href="home.php">Home</a>
                <a href="about.php">About</a>
                <a href="contact_us.php">Contact</a>
                <?php 
                if(isset($_SESSION['user'])){
                    echo "<a  href='profile.php'>Profile</a>";
                    echo "<a href='logout.php'>Logout</a>";

                }
                else{
                    echo "<a href='Login.php'>Login</a>";
                }
                          ?>

                
            </ul>
        </div>
    </div>

</nav>


