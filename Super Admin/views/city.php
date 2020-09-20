<?php

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
			echo "CITY ADDED!";
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
            <legend>Add News</legend>
            <table>
                <tr>
                    <td>CITY</td>
                    <td><textarea name="city"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="create-city" value="Post"></td>
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

        alert("City fields are required");
        return false;
    }

}
</script>

</html>