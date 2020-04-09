<?php include('lib/header.php'); ?>
<?php include_once("lib/footer.php") ?>

<div class="home">
    <div class="home-body">
        <p>
        <?php 
            if (isset($_SESSION["LOGGED-IN"]) && !empty($_SESSION["LOGGED-IN"])) {
                echo "<span style='color:blue; font-size: 20px;'>" . $_SESSION["LOGGED-IN"] . "</span>";
                echo "<span style='color: red; font-sixe: 20px; font-weight: bold'>Welcome, " . $_SESSION["fullname"] . " You are logged in as a " . $_SESSION["ACL"] . "</span>.<br>";
                if ($_SESSION["ACL"] == "Mentor") {
                    include_once("mentor.php");
                }
                else if($_SESSION["ACL"] == "Student") {
                    include_once("student.php");
                }
            }else {
                header("Location: login.php");
            };
        ?>
        </p>
    </div>
</div>

