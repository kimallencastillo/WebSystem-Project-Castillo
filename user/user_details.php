<?php 
if(isset($_GET['id'])){
     // connect DB
     require_once('../db/db_connect.php');
     //  GET id
    $id = $_GET['id'];
    
    $sql_user_details = "SELECT * FROM `borrowers` WHERE id=$id";
    $result = mysqli_query($con, $sql_user_details);

    //  check error
    if($result->num_rows !=1):
        die("404");
    endif;

    //  get value
    $val = $result->fetch_assoc();
    $borrowers_id = $val['borrowers_id'];
    $borrowers_fname = $val['borrowers_fname'];
    $borrowers_lname = $val['borrowers_lname'];
    $borrowers_gender = $val['borrowers_gender'];
    $borrowers_number = $val['borrowers_number'];
    $borrwers_dept = $val['borrwers_dept'];
    $borrowers_type = $val['borrowers_type'];
    $borrowers_year = $val['borrowers_year'];
    $borrowers_section = $val['borrowers_section'];
     


}
?>
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
    <title>Borrowers Details</title>
</head>
<body>
<?php require_once 'NavBar.php' ?>
<?php require_once 'SideNavBar.php' ?>
<div class="container">
	
	<br>
	<!--<div id="borrower_info"><button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#borrower-details">Add</button></div>
	-->
	<!--Detail Borrowers -->
	<div id="borrower-details" role="dialog">
    
		<div class="modal-dialog">
			<div class="modal-content">
            <div class="title" style="text-align: center;">
                    <h2>Borrowers Details<h2>
                </div>
                <form action="" method="POST">
				<div class="modal-header">
					<input type="submit"  class="btn btn-info btn" name="back" style="float: right;" data-dismiss="modal" value="Back">
					<br><h3><?php echo $borrowers_fname.' '.$borrowers_lname; ?></h3>
				</div>
                </form>
                <?php 
                if(isset($_POST['back'])){
                    echo '<script type="text/javascript">
                                window.location.href = "user-borrowers.php";
                            </script>';
                }
                ?>

				<form id="borrowerForm" name="borrower" role="form">
					<div class="modal-body">					
					<div class="form-group">
					<table width=100%>
					<td>School ID NUMBER
						<tr>
						<td colspan = 2><input type="number" class="form-control"style="width:90%" value="<?php echo $borrowers_id;?>" readonly disabled>
						<tr>
						<td>First Name<td>Last Name
						<tr>
						<td><input type="text" class="form-control" style="width:80%" value="<?php echo $borrowers_fname;?>" readonly disabled>
						<td><input type="text" class="form-control" style="width:80%" value="<?php echo $borrowers_lname;?>" readonly disabled>
						<tr>
						<td>Gender<td>Contact Number
						<tr>
						<td><input type="text" class="form-control" style="width:80%" value="<?php echo $borrowers_gender;?>" readonly disabled></td>
						<td><input type="number" class="form-control" style="width:80%" value="<?php echo $borrowers_number;?>" readonly disabled>
						<tr>
						<td>Department<td>Type
						<tr>
						<td><input type="text" class="form-control" style="width:80%" value="<?php echo $borrwers_dept;?>" readonly disabled></td>
						<td><input type="text" class="form-control" style="width:80%" value="<?php echo $borrowers_type;?>" readonly disabled></td>
						<tr>
						<td>Year<td>Section
						<tr>
						<td><input type="number" class="form-control" style="width:80%" value="<?php echo $borrowers_year;?>" readonly disabled>
						<td><input type="Text" class="form-control" style="width:80%" value="<?php echo $borrowers_section;?>" readonly disabled>
						</table>
						</div>
				</div>
                <style>
                    .form-control {
                        background-color: transparent;
                    }
                </style>
				
					<!-- <div class="modal-footer">					
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<input type="submit" class="btn btn-success" id="submit">
					</div>-->
				</form>
				<!-- End form -->
			</div>
		</div>
	</div>			
	<div style="margin:50px 0px 0px 0px;">
	</div>	
</div>	
</body>
</html>