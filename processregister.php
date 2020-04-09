<?php 

session_start();

$errorStatement = "";

//collecting the data
$firstname = $_POST["firstname"] != "" ? $_POST["firstname"] : $errorStatement .= "Firstname!" . " ";
$lastname = $_POST["lastname"] != "" ? $_POST["lastname"] : $errorStatement .= "Lastname!" . " ";
$email = $_POST["email"] != "" ? $_POST["email"] : $errorStatement .= "Email!" . " ";
$phonenumber = $_POST["phonenumber"] != "" ? $_POST["phonenumber"] : $errorStatement .= "Phonenumber!" . " ";
$password = $_POST["password"] != "" ? $_POST["password"] : $errorStatement .= "Password!" . " ";
$gender = $_POST["gender"] != "" ? $_POST["gender"] : $errorStatement .= "Gender!" . " ";
$designation = $_POST["designation"] != "" ? $_POST["designation"] : $errorStatement .= "Designation!" . " ";
$track = $_POST["track"] != "" ? $_POST["track"] : $errorStatement .= "Track!" . " ";

// print $errorStatement;
$_SESSION["firstname"] = $_POST["firstname"];
$_SESSION["lastname"] = $_POST["lastname"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["phonenumber"] = $_POST["phonenumber"];
$_SESSION["gender"] = $_POST["gender"];
$_SESSION["designation"] = $_POST["designation"];
$_SESSION["track"] = $_POST["track"];

//verifying the data, validation

if(strlen($firstname) <= 2 || preg_match('~[0-9]~', $firstname)) {
    $_SESSION["error"] = "firstname should not contain numbers or be less than 2 characters!!!";
    header("Location: register.php");
}
else if(strlen($lastname) <= 2 || preg_match('~[0-9]~', $lastname)) {
    $_SESSION["error"] = "lastname should not contain numbers or be less than 2 characters!!!";
    header("Location: register.php");
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) <= 5) {
    $_SESSION["error"] = "Invalid Email Format!!!";
    header("Location: register.php");
}
else if($errorStatement != "") {
    //redirect back to registration page and display error
    $_SESSION["error"] = $errorStatement . "ERROR. Please check and refill the form";
    header("Location: register.php");
} else {

    //count existing users
    $directories = array("Mentor", "Student");
    foreach ($directories as $value) {
        $dir ="db/users/" . $value . "/";
        $users = new RecursiveDirectoryIterator($dir);
        foreach (new RecursiveIteratorIterator($users) as $files) {
            $existUsers = scandir($files);
            $countExistUsers = count($existUsers);
            $userId = ($countExistUsers-2) + 1;

            $userObject = [
                "id" => $userId,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "email" => $email,
                "phonenumber" => $phonenumber,
                "password" => password_hash($password, PASSWORD_DEFAULT),
                "gender" => $gender,
                "designation" => $designation,
                "track" => $track
            ];

            foreach ($existUsers as $user) {
                if ($user == $email . ".json") {
                    $_SESSION["error"] = "User Already Exists! Registration Failed!";
                    header("Location: register.php");
                    die();
                }
            }
        }
            
    }
    file_put_contents("db/users/" . $designation . "/" . $email . ".json", json_encode($userObject));
    //return back to the page with a status message
    $_SESSION["message"] = "Hello " . $firstname . ", You have successfully Registered! Please fill in your login details.";
    header("Location: login.php");
        
}


?>