
<?php 

$returned_arr = array();
$valSearch = "";
if(isset($_POST['submit'])):
    $valSearch = $_POST['search'];
    $query ="SELECT * FROM `returned_item` WHERE CONCAT( `borrowed_name`, `borrowed_item`, `borrowed_quantity`, `borrowed_date`, `created_at`) 
     LIKE '%".$valSearch."%'";
    $search_Res = filterList($query);   
else:  
    $query = "SELECT * FROM `returned_item`";
    $search_Res = filterList($query);   
endif;


function filterList($query){
    $con = mysqli_connect('localhost', 'u466928655_inventory', 'Ccs!@#45', 'u466928655_ict_equipement');
    $filter_Res = mysqli_query($con, $query);
    return $filter_Res;
}


while($row = mysqli_fetch_array($search_Res)) :
        $returned_arr[] = $row;  
endwhile;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once '../others/font.php' ?>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	
	<title>Admin - Borrower</title>
</head>
<style>
                .search {
                    margin-left: 1%;
                    margin-top: 5%;
                    margin-bottom: 5%;

                    }
            </style>
<body>
<style>
    .btn {
     border: 1px solid black; 
     color:black;
}
</style>
    <div class="wrapper">

        <?php require_once 'NavBar.php' ?>

        <div class="content">

            <?php require_once 'SideNavBar.php' ?>

            <div class="right">
                <div class="title">
                    <h2>Returned Items<h2>
                </div>
	
                <button name="print" onclick="PrintDiv();" id=btn-print class="btn btn-info btn" style="margin-right: 90%;">Print</button>
                    
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
					
                <div class="content-container" id="content-container">
				
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
                                        <td>Borrower's Name</td>
                                        <td>Returned Item</td>
                                        <td>Borrowed Date</td>
                                        <td>Returned Date</td>
                                    </tr>
									</thead>
                                    <?php foreach($returned_arr as $val) { 
                                        $borrowed_date = strtotime($val['borrowed_date']);
                                        $return_date = strtotime($val['created_at']);
                                        ?>
                                        <tr class="text-light text-center">
                                            <td><?php echo $val['borrowed_name']; ?></td>
                                            <td><?php echo $val['borrowed_item']; ?></td>
                                            <td><?php echo date('M/d/Y h:i:s:A', $borrowed_date); ?></td>
                                            <td><?php echo date('M/d/Y h:i:s:A', $return_date); ?></td>
                                        </tr>
                                    <?php } ?>
                                
                            </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content END -->
 
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