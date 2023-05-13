<?php
$filename = $date  = $sem_name= "";
if(isset($_GET['id'])){
    $id = $_GET['id'];
                       
    //  connect to db
    require_once("../../db/db_connect.php");
    // fetch file to download from db
    $sql = "SELECT * FROM sem_certificate WHERE id=$id";
    $result = mysqli_query($con, $sql);
                                
    $row = $result->fetch_object();
    $sem_name = $row->seminar_Name;
    $filename = $row->file_cert;
    $date = $row->Date_of_sem;

    // The file path
    $path = 'uploads/';                          
    $file = $row->file_cert;
    /*
    // Header Content Type
    header('Content-type: application/pdf'); 
    header('Content-Disposition: inline; filename="' . $file . '"'); 
    header('Content-Transfer-Encoding: binary'); 
    header('Accept-Ranges: bytes'); 
    
    // Send the file to the browser.
    readfile($file);
    */
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

    <title>View Certificate</title>
</head>
<body>
<?php include("SemNavBar.php");?>
<?php include("SideNavBarCert.php");?>
<div class="container">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
            <div class="modal-body">					
					<div class="form-group">
                    <h3 style="text-align: center;">View Certificate</h3>
<?php

echo '<strong>Seminar Name : </strong>'.$sem_name . '<br>';
echo '<strong>Created Date : </strong>'.$date . '<br>';
echo '<strong>File Name : </strong>'.$filename . '<br>';
?>
<br/><br/>
<iframe src="<?php echo $path.$filename; ?>" width="90%" height="500px">
</iframe>
        </div>
	</div>
</div>
</div>
</div>		
<div style="margin:50px 0px 0px 0px;">
	</div>
</body>
</html>