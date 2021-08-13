<?php


$db = mysqli_connect("localhost", "root", "", "todo");
$rowCount = count($_POST["check_list"]);
for($i=0;$i<$rowCount;$i++) {
mysqli_query($db, "DELETE FROM tasks WHERE task_id='" . $_POST["check"][$i] . "'");
}
header("Location:index.php");
?>



?>