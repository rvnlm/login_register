<?php

// define variables and set to empty values
$firstname = $middlename = $lastname = $contact_number = $address = $username = $password_err = $confirm_password_err = "";
$firstname = $middlename = $lastname = $contact_number = $address = $username = $password = $confirm_password = "";


// Process form data when the form is submitted

if($_SERVER["PHP_SELF"] == "POST"){
    // Check if the first name is set and not empty
    if(isset($_POST['firstname']) && !empty(trim($_POST['firstname']))){
        // Capitalize the first letter and make the rest lowercase
        $firstname = ucfirst(strtolower(trim($_POST['firstname'])));
    } else {
        $firstname = "Please enter your first name.";
    }
     
    // Check if the middle name is set and not empty
    if(isset($_POST['middlename']) && !empty(trim($_POST['middlename']))){
        $middlename = ucfirst(trim($_POST['middlename']));
    } else {
        $middlename = "Please enter your middle name.";
    }
    
    // Check if the last name is set and not empty
    if(isset($_POST['lastname']) && !empty(trim($_POST['lastname']))){
        $lastname = ucfirst(trim($_POST['lastname']));
    } else {
        $lastname = "Please enter your last name.";
    }
    
    // Check if the address is set and not empty
    if(isset($_POST['address']) && !empty(trim($_POST['address']))){
        $address = ucfirst(trim($_POST['address']));
    } else {
        $address = "Please enter your address.";
    }
    
    // Check if the username is set and not empty
    if(isset($_POST["username"]) && !empty(trim($_POST["username"]))){
        // Check if username already exists in the database
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        $username_err = "Please enter your username.";
    }
    
    // Check if the password is set and not empty
    if(isset($_POST["password"]) && !empty(trim($_POST["password"]))){
        $password = trim($_POST["password"]);
        if(strlen($password) < 8){
            $password= "Password must have at least 8 characters.";
        }
    } else {
        $password = "Please enter your password.";
    }
    
    // Check if the confirm password is set and not empty
    if(isset($_POST["confirmpassword"]) && !empty(trim($_POST["confirmpassword"]))){
        $confirm_password = trim($_POST["confirmpassword"]);
        if(empty($password) && ($password != $confirm_password)){
            $confirm_password = "Passwords did not match.";
        }
    } else {
        $confirm_password_err = "Please enter your confirm password.";
    }
}
  
?>