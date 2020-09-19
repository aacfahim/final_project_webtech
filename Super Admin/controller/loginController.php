<?php

session_start();
require_once("../services/userService.php");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        header('location: ../views/login.php?error=null');

    }else{

        $user = [
            'username' => $username,
            'password' =>  $password

        ];

        $status = validate($user);

        if($status){
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            
            setcookie('username', $username, time()+3600, '/');
            setcookie('STATUS', 'OK', time()+3600, '/');


            header("location: ../views/dashboard.php");
        }else{
            header("location: ../views/login.php?error=invalid");
        }

    }

}

?>