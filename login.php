
<?php include_once('lib/header.php')?>
    <div id="heading">
        <h1 class="heading text-danger">Welcome Again!!!</h1>
        <P>
            <?php if(isset($_SESSION["message"]) && !empty($_SESSION["message"])) {
                echo "<span style='color:green; font-size: 20px;'>" . $_SESSION["message"] . "</span>";
                session_destroy();
            }
            ?>
        </P>
    </div>
<div id="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 reg-form-body">
            <form action="processlogin.php" method="POST" class="form">
            <div class="heading">
                <h3>LogIn</h3>
                <P>
                <?php if(isset($_SESSION["error"]) && !empty($_SESSION["error"])) {
                    echo "<span style='color:red;'>" . $_SESSION["error"] . "</span>";
                    session_destroy();
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label><br>
                <input 
                <?php 
                    if(isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
                    echo "value=" . $_SESSION["email"];
                    }
                ?>
                type="email" placeholder="Email Address" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label><br>
                <input type="password" placeholder="Password" name="password" class="form-control">
            </div>
            <div class="form-group" class="btn-div">
                <button type="submit" class="btn btn-lg btn-outline-danger" class="form-control">LOGIN</button>
            </div>
            </form>
        </div>
        </div>
    <div class="col-sm-4"></div>
    </div>
</div>
<?php include_once('lib/footer.php')?>