<?php 

if(isset($_GET['id'])){
     // declaration
     $gender = $type = $dept = ""; 
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
                    <h2>Edit Borrower<h2>
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
                                window.location.href = "admin-borrowers.php";
                            </script>';
                }
                ?>

				<form id="borrowerForm" name="borrower" role="form" method="POST">
					<div class="modal-body">					
					<div class="form-group">
					<table width=100%>
					<td>School ID NUMBER
						<tr>
						<td colspan = 2><input type="number" name="schoolID" class="form-control"style="width:90%" value="<?php echo $borrowers_id;?>"  >
						<tr>
						<td>First Name<td>Last Name
						<tr>
						<td><input type="text" class="form-control" name="fname" style="width:80%" value="<?php echo $borrowers_fname;?>"  >
						<td><input type="text" class="form-control" name="lname" style="width:80%" value="<?php echo $borrowers_lname;?>"  >
						<tr>
						<td>Gender<td>Contact Number
						<tr>
						<td><select class="form-control" style="width:80%" name="gender" required>
                            <option><?php echo $borrowers_gender;?></option>
                            <option value="Male" <?php if ($gender == 'Male') {  echo 'selected';} ?>>Male</option>
                            <option value="Female" <?php if ($gender == 'Female') {  echo 'selected';} ?>>Female</option>
							</select> </td>
						<td><input type="number" name="number" class="form-control" style="width:80%" value="<?php echo $borrowers_number;?>" >
						<tr>
						<td>Department<td>Type
						<tr>
                        <td><select class="form-control" style="width:80%" name="dept" required>
                                <option><?php echo $borrwers_dept;?></option>
                                <option value="BSIS" <?php if ($dept == 'BSIS') {  echo 'selected';} ?>>BSIS</option>
                                <option value="BSCS" <?php if ($dept == 'BSCS') {  echo 'selected';} ?>>BSCS</option>
                                <option value="BSCE" <?php if ($dept == 'BSCE') {  echo 'selected';} ?>>BSCE</option>
                                <option value="BSED" <?php if ($dept == 'BSED') {  echo 'selected';} ?>>BSED</option>
                                <option value="COED" <?php if ($dept == 'COED') {  echo 'selected';} ?>>COED</option>
							</select>
						<td><select class="form-control" style="width:80%" name="type" required>
                                <option><?php echo $borrowers_type;?></option>
                                <option value="Student" <?php if ($type == 'Student') {  echo 'selected';} ?>>Student</option>
                                <option value="Faculty" <?php if ($type == 'Faculty') {  echo 'selected';} ?>>Faculty</option>
                                <option value="Teacher" <?php if ($type == 'Teacher') {  echo 'selected';} ?>>Teacher</option>
                                <option value="Employee" <?php if ($type == 'Employee') {  echo 'selected';} ?>>Employee</option>
                                <option value="Custodian" <?php if ($type == 'Custodian') {  echo 'selected';} ?>>Custodian</option>
							
							</select>
						<tr>
						<td>Year<td>Section
						<tr>
						<td><input type="number" name="year" class="form-control" style="width:80%" value="<?php echo $borrowers_year;?>" >
						<td><input type="Text" name="section" class="form-control" style="width:80%" value="<?php echo $borrowers_section;?>" >
						</table>
						</div>
				</div>
                <style>
                    .form-control {
                        background-color: transparent;
                    }
                </style>
				
					 <div class="modal-footer">					
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<input type="submit" class="btn btn-success" name="accept" id="submit">
					</div>
				</form>
				<!-- End form -->
			</div>
            <?php 
            if(isset($_POST['accept'])) {
                $schoolID = mysqli_real_escape_string($con , $_POST['schoolID']);
                $fname = mysqli_real_escape_string($con , $_POST['fname']);
                $lname = mysqli_real_escape_string($con , $_POST['lname']);
                $gender = mysqli_real_escape_string($con , $_POST['gender']);
                $number = mysqli_real_escape_string($con , $_POST['number']);
                $dept = mysqli_real_escape_string($con , $_POST['dept']);
                $type = mysqli_real_escape_string($con , $_POST['type']);
                $year = mysqli_real_escape_string($con , $_POST['year']);
                $section = mysqli_real_escape_string($con , $_POST['section']);

                $sql_upt_borrowers = "UPDATE `borrowers` SET 
                `borrowers_id`='$schoolID',
                `borrowers_fname`='$fname',
                `borrowers_lname`='$lname',
                `borrowers_gender`='$gender',
                `borrowers_number`='$number',
                `borrwers_dept`='$dept',
                `borrowers_type`='$type',
                `borrowers_year`='$year',
                `borrowers_section`='$section' 
                WHERE id=$id";
                // save to db and check
                if(mysqli_query($con, $sql_upt_borrowers)):
                    // success
                    echo '<script type="text/javascript">
                            alert("Edit Successfully!");
                            window.location.href = "admin-borrowers.php";
                         </script>';
                else:
                     // error
                     echo 'Query error ' . mysqli_error($con);          
                endif;
            }
            ?>
		</div>
	</div>			
	<div style="margin:50px 0px 0px 0px;">
	</div>	
</div>	
</body>
</html>