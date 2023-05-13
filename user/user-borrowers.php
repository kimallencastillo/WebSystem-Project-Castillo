
<?php 
$valSearch = $gender = $dept = $type ="";
if(isset($_POST['submit'])):
    $valSearch = $_POST['search'];
    $query ="SELECT * FROM `borrowers` WHERE 
    CONCAT(`borrowers_id`, `borrowers_fname`, `borrowers_lname`, 
    `borrowers_gender`, `borrowers_number`, `borrwers_dept`, 
    `borrowers_type`, `borrowers_year`, `borrowers_section`) 
     LIKE '%".$valSearch."%'";
    $search_Res = filterList($query);   
else:  
    $query = "SELECT * FROM `borrowers`";
    $search_Res = filterList($query);   
endif;


function filterList($query){
    $con = mysqli_connect('localhost', 'u466928655_inventory', 'Ccs!@#45', 'u466928655_ict_equipement');
    $filter_Res = mysqli_query($con, $query);
    return $filter_Res;
}


$result_arr = array();
while($row = mysqli_fetch_array($search_Res)) :
        $result_arr[] = $row;  
endwhile;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once '../others/font.php' ?>
    <link rel="stylesheet" href="../others/DataTables-1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/manageBor.css">
    <link rel="stylesheet" href="../others/bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    
	<title>Admin - Borrowers</title>
</head>
<style>
	 
</style>
</style>
<body>
<style>
    .btn {
     border: 1px solid black; 
     color:black;
}
</style>
    <div class="wrapper" style="overflow-x: scroll;">

        <?php require_once 'NavBar.php' ?>

        <div class="content">

            <?php require_once 'SideNavBar.php' ?>

			
            <div class="right">
                <div class="title">
                    <h2>Manage Borrowers<h2>
                </div>
                <style>
                  .search {
                        margin-bottom: 20px;
						float: right;
						margin-top: 28px;
						margin-right: 60px;
					}
					.print {
                        margin-left: 5px;
                        margin-bottom: 50px;
                    }
					#borrower {
                        margin-left: 5px;
                        margin-bottom: 1px;
                    }
                </style>
				<div class="actions-container">
                    <div class="search">
                    <form action="" method="POST">
                        Search
			            <input type="text" name="search" class="" placeholder="Enter info to search..." value="<?php echo $valSearch; ?>" >
                        <!--Submit-->
			            <input type="Submit" name="submit" class="">
                        <input type="Submit" name="clear" value="Clear" class="">
                        <?php 
                        if(isset($_POST['clear'])){        
                            $valSearch = "";
                        }
                        ?>
                         </form>
                       
                    </div>
				<div class = "print">
                <button name= "print" onclick="PrintDiv();" id=btn-print class="btn btn-info btn" >Print</button>
                 </div>
				 <div id = "borrower">
                 <button type="button" id=btn-add class="btn btn-info btn" data-toggle="modal" data-target="#borrower-modal">Add borrower</button>
                </div>
				</div>
		         <div class="content-container" id="content-container" >
				
                    <div class="table">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered bg-secondary table-hover">
                            <style>
							table {
							box-shadow: 0 0 10px 1px #3366CC;
							}
							</style> 
							<form method="GET">
                                <thead>
                                    <tr class="text-light text-center">
                                        <td>ID Number</td>
                                        <td>Name</td>
                                        <td>Dept</td>
                                        <td>Type</td>
										<td>Year/Sec.</td>
										<td>Action</td>
                                    </tr>
                                </thead>

                                <!-- loop data -->
                                <?php foreach($result_arr as $val) : ?>
								<tr class="text-center">
                                    <td ><?php echo $val['borrowers_id']; ?></td>
                                    <td ><?php echo $val['borrowers_fname']. ' ' . $val['borrowers_lname']; ?></td>
                                    <td ><?php echo $val['borrwers_dept']; ?></td>
                                    <td ><?php echo $val['borrowers_type']; ?></td>
                                    <td ><?php echo $val['borrowers_year']. '/' . $val['borrowers_section']; ?></td>
                                    <td>
                                    <!-- Action --> 
                                    <div class="dropdown">
                                            <button class="dropbtn">Action 
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                            <div class="dropdown-content">
                                                <?php echo "<a class=btn-e href='user_details.php?id=".$val['id']."'>Details</a>"; ?>
                                                <?php echo "<a class=btn-e href='edit_borrowers.php?id=".$val['id']."'>Edit</a>"; ?>
                                                <?php echo "<a class=btn-e href='delete_borrower.php?id=".$val['id']."'>Delete</a>"; ?>
                                            </div>
                                        </div> 
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
       
		</div>
        <!-- Content END -->

    
    <!-- Add Borrowers -->
	<div class="container">
	<div id="borrower-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<br><h3>Add Borrower</h3>
				</div>
                <!-- Form -->
				<form id="borrowerForm" name="borrower" role="form" method="POST">
					<div class="modal-body">				
							
					<div class="form-group">
					<table width=100%>
					<td>School ID NUMBER
						<tr>
						<td colspan = 2><input type="number" class="form-control"style="width:90%" name="schoolID" required>
						<tr>
						<td>First Name<td>Last Name
						<tr>
						<td><input type="text" class="form-control" style="width:80%" name="fname" required>
						<td><input type="text" class="form-control" style="width:80%" name="lname" required>
						<tr>
						<td>Gender<td>Contact Number
						<tr>
						<td><select class="form-control" style="width:80%" name="gender" required>
                            <option value="Male" <?php if ($gender == 'Male') {  echo 'selected';} ?>>Male</option>
                            <option value="Female" <?php if ($gender == 'Female') {  echo 'selected';} ?>>Female</option>
							</select> 
						<td><input type="number" class="form-control" style="width:80%" name="number" >
						<tr>
						<td>Department<td>Type
						<tr>
						<td><select class="form-control" style="width:80%" name="dept" required>
								<option>--Select--</option>
                                <option value="BSIS" <?php if ($dept == 'BSIS') {  echo 'selected';} ?>>BSIS</option>
                                <option value="BSCS" <?php if ($dept == 'BSCS') {  echo 'selected';} ?>>BSCS</option>
                                <option value="BSCE" <?php if ($dept == 'BSCE') {  echo 'selected';} ?>>BSCE</option>
                                <option value="BSED" <?php if ($dept == 'BSED') {  echo 'selected';} ?>>BSED</option>
                                <option value="COED" <?php if ($dept == 'COED') {  echo 'selected';} ?>>COED</option>
							</select>
						<td><select class="form-control" style="width:80%" name="type" required>
                                <option>--Select--</option>
                                <option value="Student" <?php if ($type == 'Student') {  echo 'selected';} ?>>Student</option>
                                <option value="Faculty" <?php if ($type == 'Faculty') {  echo 'selected';} ?>>Faculty</option>
                                <option value="Teacher" <?php if ($type == 'Teacher') {  echo 'selected';} ?>>Teacher</option>
                                <option value="Employee" <?php if ($type == 'Employee') {  echo 'selected';} ?>>Employee</option>
                                <option value="Custodian" <?php if ($type == 'Custodian') {  echo 'selected';} ?>>Custodian</option>
							
							</select>
						<tr>
						<td>Year<td>Section
						<tr>
						<td><input type="number" class="form-control" style="width:80%" name="year" required>
						<td><input type="Text" class="form-control" style="width:80%" name="section" required>
						</table>
						</div>
				</div>
				
					<div class="modal-footer">					
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<input type="submit" class="btn btn-success" id="submit" name="accept">
					</div>
				</form>
			</div>
		</div>
        <?php 
            if(isset($_POST['accept'])){
                // connect to DB
                require_once("../db/db_connect.php");
                //check string
                $schoolID = mysqli_real_escape_string($con , $_POST['schoolID']);
                $fname = mysqli_real_escape_string($con , $_POST['fname']);
                $lname = mysqli_real_escape_string($con , $_POST['lname']);
                $gender = mysqli_real_escape_string($con , $_POST['gender']);
                $number = mysqli_real_escape_string($con , $_POST['number']);
                $dept = mysqli_real_escape_string($con , $_POST['dept']);
                $type = mysqli_real_escape_string($con , $_POST['type']);
                $year = mysqli_real_escape_string($con , $_POST['year']);
                $section = mysqli_real_escape_string($con , $_POST['section']);
               
                $sql_insert = "INSERT INTO `borrowers`( `borrowers_id`, `borrowers_fname`, `borrowers_lname`, 
                `borrowers_gender`, `borrowers_number`, `borrwers_dept`, `borrowers_type`, `borrowers_year`, `borrowers_section`) 
                VALUES ('$schoolID','$fname','$lname','$gender','$number','$dept','$type','$year','$section')";                 

                // save to db and check
                if(mysqli_query($con, $sql_insert)):
                    // success
                    echo '<script type="text/javascript">
                            alert("Added Successfully!");
                            window.location.href = "admin-borrowers.php";
                         </script>';
                else:
                     // error
                     echo 'Query error ' . mysqli_error($con);          
                endif;
            }
        ?>
	</div>			
	<div style="margin:50px 0px 0px 0px;">
	</div>	
</div>	
   </div>
    <!-- Wrapper END -->
</body>
</html>
<script type="text/javascript">
    // print     
    function PrintDiv() {    
        var divToPrint = document.getElementById('content-container');
        var popupWin = window.open('', '_blank', 'width=700,height=500');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>