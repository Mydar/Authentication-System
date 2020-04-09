<?php 
include('lib/header.php');
if(isset($_SESSION["LOGGED-IN"]) && !empty($_SESSION["LOGGED-IN"])) {
    //redirect to dashboard
    header("Location: dashboard.php");
}
?>
<h1 class="heading text-danger">Welcome to SNG! Join Our Team!</h1>
<div id="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 reg-form-body">
        <form action="processregister.php" method="POST" class="form">
            <div class="heading">
                <h3>REGISTER</h3>
                <p>All Fields are Required!</p>
                <p>
                    <?php if(isset($_SESSION["error"]) && !empty($_SESSION["error"])) {
                    echo "<span style='color:red;'>" . $_SESSION["error"] . "</span>";
                    session_destroy();
                    }
                    ?>
                </p>
            </div>
            <div class="form-group">
                <label for="firstname">First Name</label><br>
                <input 
                <?php 
                if(isset($_SESSION["firstname"]) && !empty($_SESSION["firstname"])) {
                    echo "value=" . $_SESSION["firstname"];
                }
                ?>
                type="text" placeholder="FirstName" name="firstname" class="form-control">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label><br>
                <input 
                <?php 
                if(isset($_SESSION["lastname"]) && !empty($_SESSION["lastname"])) {
                    echo "value=" . $_SESSION["lastname"];
                }
                ?>
                type="text" placeholder="LastName" name="lastname" class="form-control">
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
                <label for="phonenumber">Phone Number</label><br>
                <input 
                <?php 
                if(isset($_SESSION["phonenumber"]) && !empty($_SESSION["phonenumber"])) {
                    echo "value=" . $_SESSION["phonenumber"];
                }
                ?>
                type="tel" placeholder="Phone Number" name="phonenumber" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label><br>
                <input type="password" placeholder="Password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label><br>
                <select name="gender" class="form-control">
                    <option value="">Select gender</option>
                    <option
                    <?php 
                    if(isset($_SESSION["gender"]) && $_SESSION["gender"] == "Female") {
                        echo "selected";
                    }
                    ?>
                    >Female</option>
                    <option
                    <?php 
                    if(isset($_SESSION["gender"]) && $_SESSION["gender"] == "Male") {
                        echo "selected";
                    }
                    ?>
                    >Male</option>
                </select>
            </div>
            <div class="form-group">
                <label for="designation">Designation</label><br>
                <select name="designation" class="form-control">
                    <option value="">Select designation</option>
                    <option 
                    <?php 
                        if(isset($_SESSION["designation"]) && $_SESSION["designation"] == "Mentor") {
                        echo "selected";
                        }
                    ?>
                    >Mentor</option>
                    <option
                    <?php 
                        if(isset($_SESSION["designation"]) && $_SESSION["designation"] == "Student") {
                        echo "selected";
                        }
                    ?>
                    >Student</option>
                </select>
            </div>
            <div class="form-group">
                <label for="track">Preferred Track</label> <br>
                <select name="track" class="form-control">
                    <option value="">Select Preferred Track</option>
                    <option 
                    <?php 
                        if(isset($_SESSION["track"]) && $_SESSION["track"] == "FrontEnd Development") {
                        echo "selected";
                    }
                    ?>
                    >FrontEnd Development</option>
                    <option
                    <?php 
                        if(isset($_SESSION["track"]) && $_SESSION["track"] == "Backend Development") {
                        echo "selected";
                        }
                    ?>
                    >Backend Development</option>
                    <option 
                    <?php 
                        if(isset($_SESSION["track"]) && $_SESSION["track"] == "Mobile Development") {
                        echo "selected";
                            }
                    ?>
                    >Mobile Development</option>
                    <option 
                    <?php 
                        if(isset($_SESSION["track"]) && $_SESSION["track"] == "UI-UX Design") {
                        echo "selected";
                        }
                    ?>
                    >UI-UX Design</option>
                    <option 
                    <?php 
                        if(isset($_SESSION["track"]) && $_SESSION["track"] == "Software Qualty Assurance") {
                        echo "selected";
                     }
                    ?>
                    >Software Qualty Assurance</option>
                </select>
            </div>
            <div class="form-group" class="btn-div">
                <button type="submit" class="btn btn-lg btn-outline-danger" class="form-control">REGISTER</button>
            </div>
        </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
<?php include('lib/footer.php') ?>