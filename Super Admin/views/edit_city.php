<?php
require_once('../controller/sessionController.php');
require_once('../services/userService.php');

$city = getCity($_GET['id']);

function validation(){

	if(isset($_GET['error'])){
		if($_GET['error'] == 'dberror'){
			echo "Service error ... Please try again.";
		}
		else if($_GET['error'] == 'null'){
			echo "City name required.";
		}
	}

	if(isset($_GET['msg'])){
		if($_GET['msg'] == 'success'){
			echo "CITY UPDATED!";
		}
	}

}

	

?>
<!DOCTYPE html>
<html>

<head>
    <title>CITY</title>
</head>

<body>
    <form name="form" action="../controller/userController.php" method="post" onsubmit="return validateAdd()">
        <fieldset>
            <legend>Edit City</legend>
            <table>
                <tr>
                    <td>CITY</td>
                    <td><input type="text" name="city" value="<?=$city['city']?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="update-city" value="Update"></td>
                </tr>
            </table>
        </fieldset>

        <?=validation();?>
    </form>
</body>

<script>
function validateAdd() {

    var city = document.form.city.value;



    if (city == null) {

        alert("City field is required");
        return false;
    }

}
</script>

</html>