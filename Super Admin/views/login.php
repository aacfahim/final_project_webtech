<?php
   
    function validation(){
        if(isset($_GET['error'])){
            if($_GET['error'] == 'null'){
                echo "All field is required.";
            }
            else if($_GET['error'] == 'invalid'){
                echo "Something went wrong";
            } 
            else if($_GET['error'] == 'invalid_request'){
                echo "Please login first..";
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
        <form action="../controller/loginController.php" method="POST" name="form" class="login_form"
            onsubmit="return validate()">
            <div class="font">Username</div>
            <input type="text" name="username">
            <div class="font font2">Password</div>
            <input type="password" name="password" class="password">
            <button type="submit" name="submit">Login</button>
        </form>

        <div class="error-message"><?php validation();?></div>


    </div>

    <script src="validate.js"></script>

</body>


</html>