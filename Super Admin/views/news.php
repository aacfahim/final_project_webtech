<?php

function validation(){

	if(isset($_GET['error'])){
		if($_GET['error'] == 'dberror'){
			echo "Service error ... Please try again.";
		}
		else if($_GET['error'] == 'null'){
			echo "All field are required.";
		}
	}

	if(isset($_GET['msg'])){
		if($_GET['msg'] == 'success'){
			echo "NEWS ADDED!";
		}
	}

}
$date = date("Y-m-d");
	

?>
<!DOCTYPE html>
<html>

<head>
    <title>NEWS</title>
</head>

<body>
    <form name="form" action="../controller/infoController.php" method="post" onsubmit="return validateAdd()">
        <fieldset>
            <legend>Add News</legend>
            <table>
                <tr>
                    <td>Date</td>
                    <td><input type="text" name="date" readonly value=<?=$date?>></td>
                </tr>
                <tr>
                    <td>Topic</td>
                    <td><input type="text" name="topic"></td>
                </tr>
                <tr>
                    <td>Details</td>
                    <td><textarea name="details"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="create-news" value="Post"></td>
                </tr>
            </table>
        </fieldset>

        <?=validation();?>
    </form>
</body>

<script>
function validateAdd() {

    var topic = document.form.topic.value;
    var details = document.form.details.value;



    if (topic == null || details == null) {

        alert("All fields are required");
        return false;
    }

}
</script>

</html>