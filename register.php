<?php
   
   include 'php_register.php';
   include('database/config.php');

// Initialize variables  <!--This is the databse of the sign up form to login -->

$firstname = $middlename = $lastname = $contact_number = $address = $username = $email = $password = $confirm_password = "";
  if(isset($_POST['signup'])){

                $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
                $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
                $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
                $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
                $address = mysqli_real_escape_string($conn, $_POST['address']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = md5($_POST['password']);
                $confirm_password = md5($_POST['confirm_password']);
          
          
            $select =" SELECT * FROM register_db WHERE email ='$email' && password = '$password' ";
        
            $result= mysqli_query($conn, $select);
        
            if(mysqli_num_rows($result) > 0){
                $error[]= '<span style="color:red;">User already exists!</span>';
            } else {
                if($password != $confirm_password){
                    $error[] = '<span style="color:red;">Passwords do not match! Try again !</span>';
                
            
                }else{
                    $insert = "INSERT INTO register_db (`firstname`, `middlename`, `lastname`, `contact_number`, `address`, `email`, `password`, `confirm_password`) VALUES ('$firstname', '$middlename', '$lastname', '$contact_number', '$address', '$email', '$password', '$confirm_password')";
                     mysqli_query($conn, $insert);
                     header('location:login.php');
                }
            }
        }
      ?>


 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CITRANSCO,MPC Carwash.com</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://kit.fontawesome.com/f7d7950520.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- vendor css -->
    <link rel="stylesheet" href="asset/css/style.css">

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
     <!-- Form -->
    <div class= "background-image"></div>
    <div class= "background-logo"></div>
   
       
             <div class="typewriter">
             <h1>CITRANSCO,MPC </h1>
            </div>
             <div class="typewriter-C">
             <h1>Carwash </h1>
            </div>
              <div class="typewriter-D">
             <h1>   San Vicente, Ilocos Sur Sales and Inventory System </h1>
             </div>
   
             <div class="card mx-auto" style="height: 95vh;">
                <div class="card-body text-center">
                    <div class="mb-2"></div>
                    
                    <i class="fa-sharp fa-solid fa-user" style="font-size: 2em; color: #0690a2;"></i>
                   
                    <h3>Sign up Form</h3>
                    <h6 style="color: red; animation: move 2s infinite;">Only the admin will register the employees here!</h6>
          <!-- Style for h6 line 92 -->
    <style>
    @keyframes move {
        0% { transform: translateX(0); }
        50% { transform: translateX(20px); }
        100% { transform: translateX(0); }
    }
</style>
                   
                  <?php
                  if(isset($error)){
                    foreach ($error as $error){
                        echo '<span class= "error-msg">'.$error.'</span>';
                    }
                  }

                  ?>
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                   
     <div class="row">
    <div class="col">
        <label for="firstname"><i class="fa-solid fa-user" style="color: #00b0bd;"></i>&nbsp;Firstname</label>
        <div class="input-group mb-1">
            <input type="text" class="form-control" name="firstname"  placeholder ="Enter  Firstname" id="firstname" required value="<?= $firstname = ''; ?>">
        </div>
    </div>
    <div class="col">
        <label for="middlename">&nbsp;Middlename</label>
        <div class="input-group mb-1">
            <input type="text" class="form-control" name="middlename"  placeholder ="Enter  Middlename" id="middlename" required value="<?= $middlename = ''; ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <label for="lastname">&nbsp;Lastname</label>
        <div class="input-group mb-1">
            <input type="text" class="form-control" name="lastname"  placeholder ="Enter  Lastname"  id="lastname" required value="<?= $lastname = ''; ?>">
        </div>
    </div>
    <div class="col">
        <label for="contact_number"><i class="fa-solid fa-phone" style="color: #00b0bd;"></i>&nbsp;Contact Number</label>
        <div class="input-group mb-1">
        <input type="text" class="form-control" name="contact_number" placeholder ="Enter Contact Number"  id="contact_number" value="<?= $contact_numberr = '' ?>" maxlength="11" required >

        </div>
          <!-- character_number/contactnumber -->
        <script>
    var contactNumber = document.getElementById('contact_number');
    contactNumber.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
        
    </div>
</div>
<div class="row">
    <div class="col">
        <label for="address"><i class="fa-solid fa-house" style="color: #00b0bd;" required></i>&nbsp;Barangay/Municipality/City</label>
        <div class="input-group mb-1">
            <span class="input-group-text">Address</span> 
           <input type="text" name="address" placeholder ="Enter  Address"  class="form-control">
          
    </div>
        </div>
    </div>
    
<div class="row-mx-6">
    <div class="col">
    <p style="text-align: left;"><label for="username"><i class="fa-solid fa-circle-user" style="color: #00b0bd;"></i>&nbsp;Email</label></p>
        <div class="input-group mb-1">
            <input type="text" class="form-control" name="email" placeholder ="example@gmail.com" required id="email"  value="<?= $email = '';?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <form>
            <p style="text-align: left;"><i class="fa-solid fa-lock"style="color: #00b0bd;"></i>&nbsp;Password</p>
            <div class="input-group mb-1 <?= (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" class="form-control" name="password"   placeholder ="********" value="<?=$password = ''?>" id="password" minlength="8"  required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()"><i class="fa-solid fa-eye"></i></button>
                </div>
            </div>
                     <!-- Unhide and Hide Button -->
            <script>
                function togglePasswordVisibility() {
                    var passwordInput = document.getElementsByName("password")[0];
                    var toggleButton = document.querySelector(".input-group-append button");
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        toggleButton.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
                    } else {
                        passwordInput.type = "password";
                        toggleButton.innerHTML = '<i class="fa-solid fa-eye"></i>';a
                    }
                }
            </script>
        </div>
    </div>
   
        <div class="col">
            <p style="text-align: left;"><i class="fa-solid fa-lock" style="color: #00b0bd;"></i>&nbsp;Confirm Password</p>
            <div class="input-group mb-1 <?= (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <input type="password" class="form-control" name="confirm_password"  placeholder ="********" value="<?= $confirm_password = ''?>" id="confirmPassword" minlength="8" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="showConfirmPasswordBtn"><i class="fa-solid fa-eye"></i></button>
                </div>
            </div>
                    <!-- Unhide and Hide Button -->
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
            <span class="help-block"><?= $confirm_password_err = '' ?></span>
            <div class="form-group text-left"></div>
            <div class="form-group text-left">
                <div class="checkbox checkbox-fill d-inline"></div>
            </div>
            <div class="text-center">
                
            <button name="signup" class="btn btn-primary shadow-2 mb-3">Sign up</button>
                <div class="mb-1 text-muted">Already have an account? <a href="login.php"> Log in</a></div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</body>
</html>

