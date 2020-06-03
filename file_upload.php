<html>
<head>
<title>PHP File Upload example</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>
<h1 class="bg-info text-white justify-content-center text-center mx-auto p-3">PHP File Upload & Display</h1>
<div class="class container">
	<div class="class row justify-content-center">
		<form action="file_upload.php" method="POST" enctype="multipart/form-data">
		<div class="class input-group">
			<input type="file" name="file" class="form-control">
			<span class="ml-5"><button type="submit" name="submit" class="btn btn-primary">Save</button></span>
		</div>
		</form>
	</div>
</div>

<?php
if(isset($_POST['submit']))
{ 
$filepath = "images/" . $_FILES["file"]["name"];

if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
{
echo "<img src=".$filepath." height=200 width=300 />";
} 
else 
{
echo "Error !!";
}
} 
?>

</body>
</html>