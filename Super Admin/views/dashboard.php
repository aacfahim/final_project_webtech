<?php
    require_once('../controller/sessionController.php');	
    require_once('../services/userService.php');


    $user = SearchByUsername($_SESSION['username']);

    if(isset($_GET['error'])){
		if($_GET['error'] == 'dberror'){
			echo "something wrong ...please try again.";
		}
    }
    


?>

<!DOCTYPE html>
<html>

<head>

    <style>
    .dashboard-left-panel {
        background-color: yellow;
        padding-bottom: 100%;

    }

    .search-panel {
        padding-right: 50%;
        padding-top: 10%;
    }
    </style>


    <title>ADMIN | Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
</head>

<body>
    <h1>CONTROL PANEL</h1>
    <h5>Welcome Home <?=$_SESSION['username']?></h5>


    <form action="../controller/searchController.php">
        <table>
            <tr>
                <td>
                    <div class="dashboard-left-panel">
                        <nav> <a href="dashboard.php">Dashboard</a></nav>
                        <nav> <a href="jobs.php">Job</a></nav>
                        <nav> <a href="employer_list.php">Employers</a></nav>
                        <nav> <a href="candidate.php">Candidate</a></nav>
                        <nav> <a href="add_company.php">Add Company</a></nav>
                        <nav> <a href="news.php">News</a></nav>
                        <nav> <a href="profile.php">Profile</a></nav>
                        <nav> <a href="../controller/logoutController.php">Logout</a></nav>
                    </div>

                    <div>
                <td>
                    <input type="text" placeholder="Enter Username" id="username" name="username">
                    <input type="button" id="submit" name="submit" value="SEARCH" onclick="searchUser()">
                </td>

                </div>

                </td>

                <td class="search-panel">
                    <div id="search-result"></div>

                </td>
            </tr>


        </table>
    </form>

    <script>
    function searchUser() {

        var username = document.getElementById("username").value;
        var xhttp = new XMLHttpRequest();

        xhttp.open("POST", "../controller/searchController.php", true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('username=' + username);


        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                //alert(this.responseText);
                document.getElementById("search-result").innerHTML = this.responseText;
            }
        }



    }
    </script>

</body>

</html>