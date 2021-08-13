<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=todo', 'root', '');

$data = array();

$query = "SELECT * FROM tasks WHERE `task_name` !='".""."' AND `task_status`='Completed' ORDER BY task_id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'task_id'   => $row["task_id"],
  'task_name'   => $row["task_name"]
 );
}

//echo json_encode($data);

?>
