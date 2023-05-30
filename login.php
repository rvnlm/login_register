<?php

include 'database/config.php';

session_start();

if(isset($_POST['signup'])){
        
        
   
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm_password']);

    $select =" SELECT * FROM register_db WHERE email ='$email' && password = '$password' ";
        
    $result= mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[]= '<span style="color:red;">User invalid exists!</span>';
    } else {
        if($password != $confirm_password){
            $error[] = '<span style="color:red;">Passwords do not match! Try again !</span>';
        
    
        }else{
            $insert = "INSERT INTO register_db ( `email`, `password`, `confirm_password`) VALUES ( '$email', '$password', '$confirm_password')";
             mysqli_query($conn, $insert);
            
             header('location:login.php');// this line header will connect to Dashboard//
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CITRANSCO,MPC Carwash.com</title>

    <script src="https://kit.fontawesome.com/f7d7950520.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>
    
  
    <!-- vendor css -->
    <link rel="stylesheet" href="asset/css/signin.css">

    <!-- Custom CSS -->
    <style>
        .background-image {
            background-image: url('image/citransco 1 pic.JPG');
        }
        .background-logo {  
        background-image: url('image/Untitled-4.png');
    }
        
     
    </style>
</head>


<body>

   <div class="background-image"></div>
    
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
             <div class="background-logo"></div>
            <div class="typewriter">
             <h1>CITRANSCO,MPC </h1>
            </div>
             <div class="typewriter-C">
             <h1>Carwash </h1>
            </div>
              <div class="typewriter-D">
             <h1>   San Vicente, Ilocos Sur Sales and Inventory System </h1>
             </div>
   
            
                
                <div class="card " style="height: 80vh;">
                     <div class="card-body text-center">
                       
                        <div class="mb-4"></div>
                        <i class="fa-sharp fa-solid fa-user" style="font-size: 2em; color: #0690a2;"></i>

                        <h3 class="mb-4">Login</h3>

                        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <p style="text-align: left;"><i class="fa-solid fa-circle-user"style="color: #00b0bd;"></i>&nbsp;Email</p>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control"name="email" placeholder ="example@gmail.com" >
                        </div>

                        <p style="text-align: left;"><i class="fa-solid fa-lock"style="color: #00b0bd;"></i>&nbsp;Password</p>
                        <span class="help-block"><?= $email = ''; ?></span>
                        <div class="input-group mb-3" >
                         <input type="password" class="form-control" name="password" placeholder ="********"  id="password" minlength="8"  required>
                         <div class="input-group-append">
                             <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()"><i class="fa-solid fa-eye"></i></button>
                         </div>
                    </div>
                            <script>
                            function togglePasswordVisibility() {
                            var passwordInput = document.getElementsByName("password")[0];
                            var toggleButton = document.querySelector(".input-group-append button");
                     if (passwordInput.type === "password") {
                            passwordInput.type = "text";
                            toggleButton.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
                     } else {
                            passwordInput.type = "password";
                            toggleButton.innerHTML = '<i class="fa-solid fa-eye"></i>';
    }
}
</script>

                        <p style="text-align: left;"><i class="fa-solid fa-lock" style="color: #00b0bd;"></i>&nbsp;Confirm Password</p>
                        <span class="help-block"><?= $password= ''?></span>
                        <div class="input-group mb-3" >
                        <input type="password" class="form-control" name="confirm_password"  placeholder ="********"  value="<?= $confirm_password = ''?>"id="confirmPassword"  minlength="8"  required > 
                        <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button"  id="showConfirmPasswordBtn"><i class="fa-solid fa-eye"></i></button>
    </div>
    
</div>
                        <script>
                        var confirmPasswordField = document.getElementById("confirmPassword");
                        var showConfirmPasswordBtn = document.getElementById("showConfirmPasswordBtn");
                        showConfirmPasswordBtn.addEventListener("click", function() {
                 if (confirmPasswordField.type === "password") {
                        confirmPasswordField.type = "text";
                        showConfirmPasswordBtn.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
              } else {
                         confirmPasswordField.type = "password";
                         showConfirmPasswordBtn.innerHTML = '<i class="fa-solid fa-eye"></i>';
        }
    });
</script>

                        <span class="help-block"><?= $confirm_password= '' ?></span>
                        <div class="form-group text-left">
                        
                        </div>
                        <div class="form-group text-center">
                            <div class="checkbox checkbox-fill d-inline">
                            </div>
                        </div>
                         <div class="text-center">
                        <button name="signup" class="btn btn-primary shadow-2 mb-4">Login</button></div>
                        
                    <div class="mb-2 text-muted">Forgot password? <a href="recover_password.php">Recover</a>
                    <div class="mb-0 text-muted">Don’t have an account? <a href="register.php">Signup</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
