<?php
$db = mysqli_connect("localhost", "root", "", "todo") or die ("Failed" . mysqli_error($db));


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
  if (isset($_POST['update'])) {
    $task = $_POST['newtaskname'];
    $id = $_POST['taskid'];
  
    $sql = "UPDATE tasks SET task_name='$task' WHERE task_id='$id'";
  }
  
  if ($db->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $db->error;
  }
  
  $db->close();

  header("Location:index.php");

?>