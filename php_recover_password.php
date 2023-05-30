<?php

require 'database/config.php';

    
    $email="";
    if(isset($_POST['submit'])){
        $mail=  ($_POST['email']);
        
        if($email){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sql=("select firstname, middlename, lastname, contact_number, address. email, password, confirm_password where email='$email' ") or die (mysql_error());
                $results = mysqli_query($conn, $sql);
                $q=  mysqli_affected_rows($conn);
                if($q<1){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <span class="text-danger">E-mail addresses did not match!</span>
                        </div>';
                }else 
                if($q > 1){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <span class="text-danger">Duplicate e-mail address found!</span>
                        </div>';
                }else 
                    if($q == 1){
                        $res=mysqli_fetch_array($results);
                        
                        $id=$res['id'];
                        
                        $rid= md5(uniqid(rand(),true));
                        
                        
                        $key=md5($rid);
                        $sql=("UPDATE register_db SET activation='$key' where id='$id' ") or die (mysql_error());
                        
                        
                        
                        $email=base64_encode($email);
                        
                        $name=$res['fname'];
                        
                        $to=$res['email'];
                        $subject='Password Reset|IT SKILLS ACADEMY';
                        $message="Hello $name,<br> 
                                Someone requested to reset your password.<br>
                                If this was you,<a href='http://192.168.43.120/forgot_password/public/pages/reset.php?mail=$email&key=$key'>click here</a>to reset your password,
			        if not just ignore this email.
                                <br><br>
			        Thank you,
                                <br><br>
                                IT SKILLS ACADEMY
                                <br><br>";
                            

			// Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        
                        $headers .='From:noreply@gmail.com/';
                        $m=mail($to,$subject,$message,$headers);
                            
                        if($m)
                        {
                            $mail="";
                            $_SESSION['new']='true';
                            header("Location:#");
                            echo "<script type='text/javascript'> document.location = '#'; </script>";
                            exit();
                            
                        }else{
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                        <span class="text-danger">Error occured while trying to send e-mail</span>
                                </div>';
                        }
                    }          
        }else {
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        <span class="text-danger">Invalid Format!</span>
                </div>';
        }
        }else {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        <span class="text-danger">Enter your e-mail!</span>
                </div>';
        }
    }
?>