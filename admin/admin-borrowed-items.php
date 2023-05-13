<?php 
//  Declaration
$valSearch = "";
$borrowed_arr = array();


if(isset($_POST['submit'])):
    $valSearch = $_POST['search'];
    $query ="SELECT * FROM `borrowed_item` WHERE 
    CONCAT(`borrowed_serialID`, `borrowed_name`, `borrowed_room`, 
    `borrowed_item`, `item_category`, `item_model`, `borrowed_quantity`, 
    `borrowed_return_date`, `borrowed_status`) LIKE '%".$valSearch."%'";
    $search_Res = filterList($query);   
else:  
    $query = "SELECT * FROM `borrowed_item`";
    $search_Res = filterList($query);   
endif;


function filterList($query){
    $con = mysqli_connect('localhost', 'u466928655_inventory', 'Ccs!@#45', 'u466928655_ict_equipement');
    $filter_Res = mysqli_query($con, $query);
    return $filter_Res;
}

while($row = mysqli_fetch_array($search_Res)) :
    $borrowed_arr[] = $row;  
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
    <link rel="stylesheet" href="../css/borrowed.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
   <title>Admin - Borrower</title>
</head>
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
            <style>
                .search {
                    margin-left: 1%;
                    margin-bottom: 5%;

                    }
            </style>

            <div class="right">
                <div class="title">
                    <h2>Borrowed Items<h2>
                        
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
					
                <div class="content-container" id=content-container>
				
                    <div class="table" >
                        <div class="table-responsive">
                         
                            <table class="table table-striped table-bordered bg-secondary table-hover">
                            <style>
							table {
							box-shadow: 0 0 10px 1px #3366CC;
							}
							</style>
							<form method="POST">
                                <thead>
                                    <tr class="text-light text-center">
                                        <td>Borrower's Name</td>
                                        <td>Borrowed Date</td>
                                        <td>Item Borrowed</td>
                                        <td>Room</td>
                                        <td>Action</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <?php foreach($borrowed_arr as $val) : 
                                        $date = strtotime($val['created_at']);
                                    ?>
                                    <tr class="text-light text-center">
                                        
                                    <td ><?php echo $val['borrowed_serialID']. ' ' .$val['borrowed_name']; ?></td>
                                    <td ><?php echo date('M/d/Y h:i:s:A', $date); ?></td>
                                    <td ><?php echo $val['borrowed_item']  . '-' . $val['item_category']; ?></td>
                                    <td ><?php echo $val['borrowed_room']; ?></td>
                                    <td ><?php ?>
                                    <!-- Action --> 
                                    <div class="dropdown">
                                            <button class="dropbtn">Action 
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                            <div class="dropdown-content">
                                                <?php echo "<a class=btn-e href='approved.php?id=".$val['id']."'>Approved</a>"; ?>
                                                <?php echo "<a class=btn-e href='rejected.php?id=".$val['id']."'>Reject</a>"; ?>
                                            </div>
                                        </div> 
                                    </td>
                                    <?php if($val['borrowed_status'] == 0) :?>
                                    <td ><input type="submit" value="Pending" disabled></td>
                                    <?php else: ?>
                                        <td><a class='btn btn-success' href='return.php?id=<?php echo $val['id']; ?>'>Return</a></td>
                                    <?php endif;?>
                                    </tr>
                                <?php endforeach;?>
                            </form>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Content END -->

   </div>
    <!-- Wrapper END -->

    </script>
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