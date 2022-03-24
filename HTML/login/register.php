<?php
    session_start();
    require_once('server.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src = "js/bootstrap.min.js"> </script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src = "js/bootstrap.min.js"> </script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image: url("33.jpg");

  min-height: 1000px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 10;
  margin: 20px;
  max-width: 450px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email], input[type=tel] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password], input[type=email],input[type=tel]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}

.text {

    
  color: black;
  font-size: 50px;
  padding: 8px 12px;


  width: 100%;
  text-align: right;
}
</style>
</head>
<body>
    




<div class="bg-img">
<div class="text" >꧁⊱Welcome to Flower Garden⊰꧂</div>
<form action="register_db.php" method="post"class="container">
        <h2>Register</h2>
    
    <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3 class="text-danger">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
       
         
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="surrname"><b>Surname</b></label>
    <input type="text" placeholder="Enter Surname" name="surrname" required>
     
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="tel"><b>Telephone Number</b></label>
    <input type="tel" placeholder="Enter telephone number" name="tel" required>
     
    <label for="password_1"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password_1" required>

    <label for="password_2"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="password_2" required>

            <button type="submit" name="reg_user" class="btn btn-success">Register</button>
       
        <p class="text-danger">Already a member? <a href="login.php">Sign in</a></p>
       
          
         
        </form> 
        
        </div>


        
        
    
        
    
        

         
</body>
</html>
        