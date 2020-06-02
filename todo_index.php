<?php 
    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "todo_app");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO tasks (task) VALUES ('$task')";
			mysqli_query($db, $sql);
			header('location: todo_index.php');
		}
	}	

	// delete task
if (isset($_GET['del_task'])) {
	$id = $_GET['del_task'];

	mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
	header('location: todo_index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>To Do Project</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	
<h1 class="bg-info text-white justify-content-center text-center mx-auto p-3">PHP ToDo Project</h1>
<div class="class container">
	<div class="class row justify-content-center">
		<form action="todo_index.php" method="POST">
		<div class="class input-group">
			<input type="text" name="task" class="form-control">
			<span class="ml-5"><button type="submit" name="submit" class="btn btn-primary">Save</button></span>
		</div>
		</form>
	</div>

	<div class="row justify-content-center mt-5">
		<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">To Do List</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  	<?php 
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row['task']; ?></td>
      <td><a href="todo_index.php?del_task=<?php echo $row['id'] ?>" class="btn btn-danger">X</a></td>
      
    </tr>
   <?php $i++; } ?>
  </tbody>
</table>
	</div>
</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>