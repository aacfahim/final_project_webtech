<?php
	require_once('../controller/sessionController.php');
	require_once('../services/userService.php');

	function validatephp(){
		if(isset($_GET['msg'])){
			if($_GET['msg'] == 'success'){
				echo "Job details updated.";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>user List</title>
</head>
<body>

	<h1>Job posts</h1>

	<?php
		$users = getAllJobs();
	?>
	<?=validatephp();?>

	<table border=1> 
		<tr>
			<td>JOB ID</td> 
			<td>NAME</td>
			<td>DESCRIPTION</td> 
            <td>SALARY</td>
			<td>ACTION</td>
            
		</tr>
		<?php for($i=0; $i != count($users); $i++ ){ ?>
			<tr>
                <td><?= $users[$i]['id'] ?></td>
				<td><?= $users[$i]['name'] ?></td>
				<td><?= $users[$i]['description'] ?></td>
				<td><?= $users[$i]['salary'] ?></td>
				<td>
					<a href="edit_job.php?id=<?=$users[$i]['id']?>"> Edit</a>
					<button type="button" onclick="deleteJob('<?=$users[$i]['id']?>')">Delete</button>

					<?php
					if($users[$i]['permission'] == "OK"){ ?>

					<button type="button" disabled onclick="approve('<?=$users[$i]['id']?>')">ACCEPT</button>

					<?php } else{ ?>
					
						<button type="button" id='<?=$users[$i]['id']?>' onclick="approve('<?=$users[$i]['id']?>')">ACCEPT</button>

					<?php } ?>

				</td>
			</tr>
		<?php } ?>
    </table>
    
	<script>
		 function approve(currID){

			
			var xhttp = new XMLHttpRequest();

            xhttp.open("POST", "../controller/approve.php", true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhttp.send("id="+currID);


			xhttp.onreadystatechange = function(){

				if(this.readyState == 4 && this.status == 200){
					
					alert(this.responseText);
					document.getElementById(currID).disabled = true;

				}
			}

		}

		function deleteJob(currID){

			
			var xhttp = new XMLHttpRequest();

            xhttp.open("POST", "../controller/jobDelete.php", true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhttp.send("id="+currID);


			xhttp.onreadystatechange = function(){

				if(this.readyState == 4 && this.status == 200){
					
					alert(this.responseText);

				}
			}

			

		}


	</script>

</body>
</html>