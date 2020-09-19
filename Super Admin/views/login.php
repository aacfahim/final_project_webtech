<?php
   
    function validation(){
        if(isset($_GET['error'])){
            if($_GET['error'] == 'null'){
                echo "All field is required.";
            }
            else if($_GET['error'] == 'invalid'){
                echo "Wrong username/password";
            } 
            else if($_GET['error'] == 'invalid_request'){
                echo "Please Login First.";
            }      
        }
    }

    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | ADMIN</title>
    <link rel="stylesheet" href="css/style.css">


</head>



<body>
    <div class="container">
        <h1 class="label" align="center">ADMIN LOGIN</h1>
        <form action="../controller/loginController.php" method="POST" name="form" class="login_form" onsubmit="return validateLogin()">
            <div class="font">Username</div>
            <input type="text" name="username" class="username">
            <div class="font font2">Password</div>
            <input type="password" name="password" class="password">
            <button type="submit" name="submit">Login</button>
        </form>

        <div class="error-message"><?php validation();?></div>


    </div>


</body>

<script>
function validateLogin() {

    var username = document.form.username.value;
    var password = document.form.password.value;


    if (username == "" || username == null || password == "" || password == null) {

        alert("username/password Can't be blank")
        return false;
    }
    else if(username.match(' ')){
        alert("username can't have spaces between")
        return false;
    }

}
</script>


</html>