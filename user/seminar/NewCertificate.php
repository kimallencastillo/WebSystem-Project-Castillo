<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<body>
<?php include("SemNavBar.php");?>
<?php include("SideNavBarCert.php");?>
<div class="container">
	
	<br>
	<style>
		span{
			color: red;
		}
	</style>
	<!--<div id="borrower"><button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#borrower-modal">Add</button></div>
	<div id="borrower-modal" class="modal fade" role="dialog">-->
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<br><h3>New Certificate</h3>
				</div>
				<form id="borrowerForm" name="borrower" role="form" method="POST" enctype="multipart/form-data">
					<div class="modal-body">					
					<div class="form-group">
					<table width=100%>
						<td>First Name<span>*</span><td>Last Name<span>*</span>
						<tr>
						<td><input type="text" class="form-control" style="width:80%" name="fname" required>
						<td><input type="text" class="form-control" style="width:80%" name="lname" required>
						<tr>
						<td>Seminar's Name<span>*</span>
						<tr>
						<td colspan = 2><input type="text" class="form-control"style="width:90%" name="semname" required> 
						<tr>
						<td>Date of Seminar<span>*</span><td>Insert Cetificate<span>*</span>
						<tr>
						<td><input type="date" type="datetime-local" class="form-control" style="width:80%" name="date" required>
						<td><input type="file" class="form-control" style="width:80%" name="userfiles" id="userfiles" required>
						</table>
						</div>
				</div>
				
					<div class="modal-footer">					
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<input type="submit" name="submit" class="btn btn-success" id="submit">
					</div>
				
			</div>
		</div>
	</div>	
	</form>		
	<div style="margin:50px 0px 0px 0px;">
	</div>	
</div>
<?php 
if(isset($_POST['submit'])){
	//	connect db
	require_once("../../db/db_connect.php");
	//	declaration
	$fname = $lname = $semname = $date = $userfiles = "";
	//	check string
	$fname =  mysqli_real_escape_string($con , $_POST['fname']);
	$lname =  mysqli_real_escape_string($con , $_POST['lname']);
	$semname =  mysqli_real_escape_string($con , $_POST['semname']);
	$date =  mysqli_real_escape_string($con , $_POST['date']);

	//	name of uploaded file
	$certFile = $_FILES['userfiles']['name'];

	// destination of the file on the server
    $destination = 'uploads/' . $certFile;

    // get the file extension
    $extension = pathinfo($certFile, PATHINFO_EXTENSION);

	$file = $_FILES['userfiles']['tmp_name'];
    $size = $_FILES['userfiles']['size'];
	
	if(!in_array($extension, ['pdf'])){
		echo '<script type="text/javascript">
				alert("You file extension must be .zip, .pdf or .docx!");
			  </script>';
	}elseif($_FILES['userfiles']['size'] > 1000000) {
		echo '<script type="text/javascript">
				alert("File too large!");
			  </script>';
			  
	}else{
		if(move_uploaded_file($file, $destination)){
			$query = "INSERT INTO sem_certificate (fname, lname, `vkey`, seminar_Name, Date_of_sem, file_cert, size, download) 
			VALUES ('$fname','$lname', '$vkey_user','$semname','$date', '$certFile', $size, 0)";
			if(mysqli_query($con, $query)){
				echo '<script type="text/javascript">
						alert("Added Succesfully!");
			  		  </script>';
				return;		
			}
		}else {
			echo '<script type="text/javascript">
					alert("Failed to upload file");
			  	  </script>';	
		}
	}
}
?>
</body>	
</head>
</html>
