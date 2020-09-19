<?php

  require_once('../services/userService.php');

  $username = $_POST['username']; 
  $user = SearchByUsername($username);
  $UsernameDB = $user['username'];

  
  if(empty($username)){

    echo "Username field is required";

    }
    else if($user['username'] == ""){
        echo "No Results Found!";
    }
    else{


        $data = "<table border=1>
        <tr>
            <td>Name</td>
            <td>Username</td>
            <td>Email</td>
            <td>Password</td>
            <td>Action</td>
        </tr>";

    $data .= "<tr>
            <td>{$user['name']}</td>
            <td>{$user['username']}</td>
            <td>{$user['email']}</td>
            <td>{$user['password']}</td>
            <td>
					<a href='edit_employer.php?username=$UsernameDB'>Edit</a>
                    <a href='delete_employer.php?username=$UsernameDB'> Delete</a>
				</td>
        </tr>";

    $data .= "</table>";
    echo $data;

    }

    

?>