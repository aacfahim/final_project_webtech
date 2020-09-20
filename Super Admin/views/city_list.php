<?php
	require_once('../controller/sessionController.php');
	require_once('../services/userService.php');

	function validatephp(){
		if(isset($_GET['msg'])){
			if($_GET['msg'] == 'company-success'){
				echo "New City added.";
			}
		}

	}
?>

<!DOCTYPE html>
<html>

<head>
    <title>City List</title>
</head>

<body>

    <h1>City List page</h1>
    <?=validatephp();?>

    <?php
		$city = getAllCity();
	?>

    <table border=1>
        <tr>
            <td>CITY</td>
        </tr>
        <?php for($i=0; $i != count($city); $i++ ){ ?>
        <tr>
            <td><?= $city[$i]['city'];?></td>

            <td>
                <a href="edit_city.php?id=<?=$city[$i]['id'];?>"> Edit</a> |
                <button type="button" onclick="deleteCity('<?=$city[$i]['id'];?>')"> DELETE CITY</button>

            </td>
        </tr>
        <?php } ?>
            <br>
        
    </table>
    <p align="center"><a href="Dashboard.php" >Back to Dashboard</a></p>


    <script>
    function deleteCity(currID) {


        var xhttp = new XMLHttpRequest();

        xhttp.open("POST", "../controller/cityDeleteController.php", true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("id=" + currID);


        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                alert(this.responseText);
            }
        }



    }
    </script>

</body>

</html>