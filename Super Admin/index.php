<?php
	
	function SearchJob($job){
		$con = DBconnect();
		$sql = "select * from job where username ='{$job}' AND permission= 'OK'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | JOB PORTAL</title>
</head>

<body>

    <center>
        <h1>WELCOME TO ONLINE JOB PORTAL</h1>
    </center>


    <form action="jobSearchController.php" method="POST">

        <span>
            Welcome to online Job Portal. It provides facility to the Job Seeker to search for various jobs
            as per his qualification. Here Job Seeker can registered himself on the web portal and create
            his profile along with his educational information. Job Seeker can search various jobs and apply
            for the Job.
        </span>

        <div align="right">
            <span>
                <br>
                <input type="text" placeholder="Search Job" id="job" name="job">
                <input type="button" id="submit" name="submit" value="SEARCH" onclick="searchJob()">
            </span>
        </div>

        <div>
            <br>
            <div id="nav">
                <a href="#">Login as Job Seeker</a><br>
                <a href="#">Login as Company</a><br>
                <a href="views/login.php">ADMIN PANEL</a>

            </div>
        </div>




    </form>

    <div align="right">
        <br>
        <div id="search-result"> </div>
    </div>




    <script>
    function searchJob() {

        var name = document.getElementById("job").value;
        var xhttp = new XMLHttpRequest();

        xhttp.open("POST", "jobSearchController.php", true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('name=' + name);


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