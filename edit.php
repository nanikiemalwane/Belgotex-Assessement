
<!DOCTYPE html>
<html
<head>



	<title>Edit Task</title>
	
	<link rel="stylesheet" href="css/style.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




</head>
<body>

<div align="center" style="padding-top: 90px;">
<form class="form-style-9" action="update.php" method="POST" >
<h3 style="color: #1876da;font-size: 20px;line-height: 25px;font-family: 'segoeui-bold';text-transform: uppercase;padding:15px 0px 10px 0px;display: block;">Update the selected task</h3>
<?php

if (isset($_GET['edit_task_stutus'])) {
    $id = $_GET['edit_task_stutus'];
    $task= $_GET['taskname'];
    
 

    echo "<script>console.log('Debug Objects: " . $task . "' );</script>";
    echo '
		<ul>
			<li>
			
				</li>
				<li>
					<input  type="text" value="'.$id.'"  name="taskid" class="field-style field-full" placeholder="" required />
					</li>
					<li>
						<input type="text" value="'.$task.'"  name="newtaskname" class="field-style field-full" placeholder="" required />
					</li>
					<li>
						<input type="submit" name="update"  value="Update Task" />
					</li>
		</ul>
        ';}
        ?>       
</form>

</div>


</body>
</html>
