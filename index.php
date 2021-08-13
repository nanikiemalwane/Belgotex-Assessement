<?php
	include ('db_connect.php');

	$db = mysqli_connect("localhost", "root", "", "todo") or die ("Failed" . mysqli_error($db));
	

		include('insert.php');
	

	//delete task  
	
	if (isset($_GET['delete_task_id'])) {
		$id = $_GET['delete_task_id'];
	
		mysqli_query($db, "DELETE FROM tasks WHERE task_id=".$id);
		header('location: index.php');

	}
	//update task status
	

	if (isset($_GET['update_task_stutus'])) {
		$id = $_GET['update_task_stutus'];
	
		mysqli_query($db, "UPDATE  tasks SET task_status='Completed' WHERE task_id=".$id);
		header('location: index.php');
	}

	


	//delete selected tasks
        if(isset($_POST['deleteselected'])){

            if(isset($_POST['check_list'])){
			
                foreach($_POST['check_list'] as $deleteid){

                    $deleteTask = "DELETE from tasks WHERE task_id=".$deleteid;
                    mysqli_query($db,$deleteTask);
                }
            }
            
        }

	//Update selected tasks
	if(isset($_POST['updateselected'])){

		if(isset($_POST['check_list'])){
			foreach($_POST['check_list'] as $updateid){

				$updateTask = "UPDATE tasks SET task_status='Completed' WHERE task_id=".$updateid;
				mysqli_query($db,$updateTask);
			}
		}
		
	}
        

?>

<!DOCTYPE html>
<html>
<head>



	<title>ToDo List</title>
	
	<link rel="stylesheet" href="css/style.css">

	


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




</head>
<body>
<form class="form-style-9" action="index.php" method="POST">
		<ul>
			<li>
				<h3 style="color: #1876da;font-size: 20px;line-height: 25px;font-family: 'segoeui-bold';text-transform: uppercase;padding:15px 0px 10px 0px;display: block;">
							Nanikie Malwane's ToDo List Application
				</h3>
				</li>
					<li>
						<input type="text"  name="task" class="field-style field-full" placeholder="Add ToDo" required />
					</li>
					<li>
						<input type="submit" name="add" value="Add Task" onClick="return confirm('You sure this is something you want to do?');" />
					</li>
		</ul>
</form>
		



		<div class="form-style-9" style="max-width: 800px;border-color:red;">
		<h4><u>Instructions</u></h4>
		<ol style="align: left;">
		<b>
			<li>	
				To delete a task , click the trash icon			
			</li>	
			<li>
				To mark a task completed, click the tick icon
			<li>
				To edit the task description, click on "Edit Task"
			</li>	
			<li>
				To delete multiple tasks, check the tasks and click the delete button 
			</li>	
			<li>
				To update multiple task statuses to complete, check the tasks and click the update button 
			</li>	
</b>
		</ol>
			<ul>	
				<form name="frmUser" action="" method="POST">
					<h3 style="color: #1876da;font-size: 20px;line-height: 25px;font-family: 'segoeui-bold';text-transform: uppercase;padding:15px 0px 10px 0px;display: block;">Tasks</h3>
					<table id="table_id" class="table table-striped table-bordered">
						<thead>
								<tr>
									<th></th>
									<th>Action</th>
									<th></th>
									<th>Task</th>
									<th>Status</th>
												
								</tr>
						</thead>
						<tbody>
							<?php
								include('load.php');
								$count = 0;
								foreach ($result as $row) {
									$count++;
									echo '
										<tr>
											<td>
												<input type="checkbox" name="check_list[]" value="'.$row["task_id"].'" />
											</td>
											<td>
												
												<a href="index.php?update_task_stutus='.$row['task_id'].'" onClick="return confirm(\'Are you sure you want to mark this as a completed task?\');" class="btn btn-success">✓</a>
														
												<a href="index.php?delete_task_id='.$row['task_id'].'"  style="font-size:12px;background-color:white; border-color:red" onClick="return confirm(\'Are you sure you want to delete this task?\');" class="btn btn-info btn-lg">
													<span style="font-size:12px;color:red" class="glyphicon glyphicon-trash"></span>  
												</a>
											</td>
											<td>
											<a href="edit.php?edit_task_stutus='.$row['task_id'].'&taskname='.$row['task_name'].'"  onClick="return confirm(\'Are you sure you want to edit the task description?\');"  class="btn btn-warning">✎Edit Task</a>
											</td>
											<td contentEditable="true">'.$row["task_name"].'
											
											</td>
											<td contentEditable="true">'.$row["task_status"].'</td>
															
										</tr>
												';
									}
							?>
										
							</tbody>
					</table>
											
					<?php

				
											
						echo '
							<input type="submit" name="deleteselected" value="Delete" onClick="return confirm(\'Are you sure you want to delete selected tasks?\');"  class="btn btn-danger"/>
							<input type="submit" name="updateselected" value="Update" onClick="return confirm(\'Are you sure you want to update the statuses of selected tasks to completed?\');"  class="btn btn-success"/>				'
						?>

			</form>								
		</ul>
	</div>


	<div class="form-style-9" style="max-width: 800px; border-color:green;">
					<ul>
					
					<form name="frmUser2" action="" method="POST">
						<h3 style="color: #1876da;
					font-size: 20px;
					align:center;
					line-height: 25px;
					font-family: 'segoeui-bold';
					text-transform: uppercase;
					padding:15px 0px 10px 0px;
					display: block;">Completed Tasks</h3>

					<table id="table_id2" class="table table-striped table-bordered">
										<thead>
											<tr>
											<th></th>
											<th></th>
											<th>Task</th>
											<th>Status</th>
												
											</tr>
										</thead>
										<tbody>
											<?php
											include('load_completed.php');
												$count = 0;
												foreach ($result as $row) {
													$count++;
													echo '
														<tr>
														
														
														<td>
														<input id="box1" type="checkbox" disabled name="check_list[]" id='.$row["task_id"].' />
														</td>
														<td>
														
														<a href="index.php?update_task_stutus='.$row['task_id'].'" disabled class="btn btn-success">✓</a>
														<a href="index.php?delete_task_id='.$row['task_id'].'" disabled onClick="confirmation();"  style="font-size:12px;background-color:white; border-color:red" class="btn btn-info btn-lg">
															<span style="font-size:12pxpx;color:red" class="glyphicon glyphicon-trash"></span>  
														</a>
															</td>
															<td contentEditable="false">'.$row["task_name"].'</td>
															
															<td>
																<td">'.$row["task_status"].'</td>
															

															
														</tr>
													';
												}
												?>
										
											</tbody>
										</table>
										

				</form>	
										
									
					</ul>
		</div>
		<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
</div>

<script>


$(document).ready( function () {
    $('#table_id').DataTable();
} );

$(document).ready( function () {
    $('#table_id2').DataTable();
} );



if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>



</body>
</html>