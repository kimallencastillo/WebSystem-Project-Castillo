<?php 
$valSearch = $catg = $cons =  $item_image = "";
if(isset($_POST['submit'])):
    $valSearch = $_POST['search'];
    $query ="SELECT * FROM `sem_certificate` WHERE CONCAT(`fname`, `lname`,`seminar_Name`, `file_cert`, `Date_of_sem` ) 
    LIKE '%".$valSearch."%'";
    $search_Res = filterList($query);   
else:  
    $query = "SELECT * FROM `sem_certificate`";
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
    <?php include_once '../../others/font.php' ?>
    <link rel="stylesheet" href="../others/DataTables-1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/inventory.css">
    <link rel="stylesheet" href="../others/bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    
</head>
<style>
    .btn {
     border: 1px solid black; 
     color:black;
}
</style>
<body>
    <?php include("SemNavBar.php");?>
    <?php include("SideNavBarCert.php");?>
    <div class="wrapper" style="overflow-x: scroll;">

        <?php //include("semNavBar.php");?>

        <div class="content">
            <?php //require_once 'SideNavBarCert.php'; ?>

            <div class="right">
                <div class="title">
                    <h2>Records<h2>
                </div>
                <style>
                    .search {
                        margin-right: 20%;
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
                            
                        }
                        ?>
                    </form>
                    </div>
                    <div class="print">
                        <button name= "print" onclick="PrintDiv();" class="btn btn-info btn" >Print</button>
                    </div>
                        
				
                    <!-- <button>Archive</button> -->
                </div>
		         <div class="content-container">
				
                    <div class="table" id=table_print>
                        <div class="table-responsive">
                         
                            <table class="table table-striped table-bordered bg-secondary table-hover">
                            <form method="GET">
                                <thead>
                                    <tr class="text-light text-center">
                                        <td>Name</td>
                                        <td>Seminar's Name</td>
                                        <td>Date</td>
                                        <th>Filename</th>
                                        <th>size (in mb)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php 
                                foreach($result_arr as $val) { 
                                    if($vkey_user == $val['vkey']):
                                    $date = strtotime($val['Date_of_sem']);
                                    ?>
                                    <tr class="text-center">      
                                            
                                        <td ><?php echo $val['fname']. " ". $val['lname']; ?></td>                          
                                        <td ><?php echo $val['seminar_Name']; ?></td>
                                        <td ><?php echo date('M/d/Y h:i:s:A', $date); ?></td>
                                        <td ><?php echo $val['file_cert']; ?></td>
                                        <td ><?php echo floor($val['size'] / 1000) . ' KB'; ?></td>
                                        <td>  <div class="dropdown">
                                            <button class="dropbtn">Action 
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                            <div class="dropdown-content">
                                               <?php echo "<a class=btn-e href='viewCert.php?id=".$val['id']."'>View</a>"; ?>
                                               <?php //echo "<a class=btn-e href='downloadCert.php?id=".$val['id']."'>Download</a>"; ?>
                                            </div>
                                        </div> </td>
                                      </tr>
                                    <?php endif; }?>
                                 </form>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
		</div>
     
        <!-- Content END -->

    <!-- Wrapper END -->
</body>

</html>
<script type="text/javascript">
    // print     
    function PrintDiv() {    
        var divToPrint = document.getElementById('table_print');
        var popupWin = window.open('', '_blank', 'width=600,height=500');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
  
</script>