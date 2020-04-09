<?php 

session_start();

$errorStatement = "";

//collecting the data
$email = $_POST["email"] != "" ? $_POST["email"] : $errorStatement .= "Email!" . " ";
$password = $_POST["password"] != "" ? $_POST["password"] : $errorStatement .= "Password!" . " ";

// print $errorStatement;
$_SESSION["email"] = $_POST["email"];

//verifying the data, validation

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) <= 5) {
    $_SESSION["error"] = "Invalid Email Format!!!";
    header("Location: login.php");
} else if($errorStatement != "") {
    //redirect back to login page and display error
    $_SESSION["error"] = $errorStatement . "ERROR. Please check and refill the form";
    header("Location: login.php");
} else {
    $directories = array("Mentor", "Student");
    foreach ($directories as $value) {
        $dir ="db/users/" . $value . "/";
        $users = new RecursiveDirectoryIterator($dir);
        foreach (new RecursiveIteratorIterator($users) as $files) {
            $existUsers = scandir($files);
            $countExistUsers = count($existUsers);
            
            for ($i=2; $i<$countExistUsers; $i++) {
                $user = $existUsers[$i];
                if ($user == $email . ".json") {
                    $userString = file_get_contents($dir . "/" . $user);
                    $userObject = json_decode($userString);
                    $userpasswordDB = $userObject->password;
                    $username = $userObject->firstname . " " . $userObject->lastname;
                    $userID = $userObject->id;
                    $userdsgn = $userObject->designation;
                    $usertrack = $userObject->track;
                    $userpassword = password_verify($password, $userpasswordDB);
                    $date_time = json_encode(new DateTime('now', new DateTimeZone('Africa/Lagos')));
                    
                    if($userpassword == $userpasswordDB) {
                        $_SESSION["LOGGED-IN"] = "Logged In! " . "<br>";
                        $_SESSION["fullname"] = $username;
                        $_SESSION["ACL"] = $userdsgn;
                        $_SESSION["usertrack"] = $usertrack;
                        $_SESSION["datetime"] = "Date: " . $date_time->date. " Timezone: " . $date_time->timezone;
                        
                        header("Location: dashboard.php");
                        (die);
                    } else {
                        $_SESSION["error"] = "Incorrect password!";
                        header("Location: login.php");
                        (die);
                    }
                }   
            }
        }
    }
    $_SESSION["error"] = "User Not Found! Fill in the Registrataion form below!";
    header("Location: register.php");
    die();
}


//return back to the page with a status message

?>
