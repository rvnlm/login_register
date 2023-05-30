
<?php
session_start();
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
    <link rel="stylesheet" href="asset/css/signin copy.css">

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
   
            
                
             <div class="card" style="height: 50vh; margin-top: 100px;">
                     <div class="card-body text-center">
                        
              <?php 
                                    include 'php_recover_password.php';
                                    
                                    if(isset($_SESSION['new'])=="true"){
                                        echo '<div class="alert alert-success absolue center text-center" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <span class="text-success">A password reset link was sent to your e-mail</span>
                                            </div>';
                                        unset($_SESSION['new']); 
                                    }
                                ?>
                        <div class="mb-4"></div>
                        <i class="fa-regular fa-lock-keyhole-open" style="font-size: 2em; color: #0690a2;"></i>

                        <h3 class="mb-4">Recover Password</h3>

                        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <p style="text-align: left;"><i class="fa-solid fa-circle-user"style="color: #00b0bd;"></i>&nbsp;Email</p>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control"name="email" placeholder ="example@gmail.com" required >
                        </div>
                       
                        <div class="form-group text-center">
                            <div class="checkbox checkbox-fill d-inline">
                            </div>
                        </div>
                        <div class="text-center">
                        <button name="recover" class="btn btn-primary shadow-2 mb-4">Recover Password</a></button></div>
                        
                        <div class="mb-0 text-muted">Already recover the password? <a href="login.php">Login</a></p>
</div>
</form>
</div>
</div>
</div>
</div>


</body>
</html>
