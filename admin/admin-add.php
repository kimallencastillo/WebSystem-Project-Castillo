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

<div class="container">
	
	<br>
	<div id="borrower_info"><button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#borrower-modal">Add</button></div>
	
	<!--Detail Borrowers -->
	<div id="borrower-details" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<br><h3>Add Borrower</h3>
				</div>


				<form id="borrowerForm" name="borrower" role="form">
					<div class="modal-body">					
					<div class="form-group">
					<table width=100%>
					<td>School ID NUMBER
						<tr>
						<td colspan = 2><input type="number" class="form-control"style="width:90%">
						<tr>
						<td>First Name<td>Last Name
						<tr>
						<td><input type="text" class="form-control" style="width:80%">
						<td><input type="text" class="form-control" style="width:80%">
						<tr>
						<td>Gender<td>Contact Number
						<tr>
						<td><select class="form-control" style="width:80%">
								<option>Select</option>
								<option>Male</option>
								<option>Female</option>
								<option>Other</option>
							</select>
						<td><input type="number" class="form-control" style="width:80%">
						<tr>
						<td>Department<td>Type
						<tr>
						<td><select class="form-control" style="width:80%">
								<option>Select</option>
								<option>BSIS</option>
								<option>BSCS</option>
								<option>BSCE</option>
								<option>BSED</option>
								<option>COED</option>
								<option>COED</option>
							</select>
						<td><select class="form-control" style="width:80%">
								<option>Select</option>
								<option>Student</option>
								<option>Faculty</option>
								<option>Teacher</option>
							</select>
						<tr>
						<td>Year<td>Section
						<tr>
						<td><input type="number" class="form-control" style="width:80%">
						<td><input type="Text" class="form-control" style="width:80%">
						</table>
						</div>
				</div>
				
					<div class="modal-footer">					
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<input type="submit" class="btn btn-success" id="submit">
					</div>
				</form>
				<!-- End form -->
			</div>
		</div>
	</div>			
	<div style="margin:50px 0px 0px 0px;">
	</div>	
</div>	