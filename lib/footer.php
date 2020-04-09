
<div class="navlink">
    <button type="submit" class="btn btn-lg btn-outline-danger"><a href="index.php">Home</a></button>
        <?php 
        if(!isset($_SESSION["LOGGED-IN"])) {
            echo "<button type='submit' class='btn btn-lg btn-outline-danger'><a href='login.php'>Login</a></button>
            <button type='submit' class='btn btn-lg btn-outline-danger'><a href='register.php'>Register</a></button>";
        } else {
            echo "<button type='submit' class='btn btn-lg btn-outline-danger'><a href='logout.php'>Logout</a></button>";
        };
        ?>
        
</div>

</body>
</html>