<?php 
$valSearch = $catg = $cons =  $item_image = "";
if(isset($_POST['submit'])):
    $valSearch = $_POST['search'];
    $query ="SELECT * FROM `item_inventory` WHERE CONCAT(`item_image`, `item_model`, `item_brand`,
     `item_category`, `item_quantity`, `item_quantity_left`, `item_status`) 
     LIKE '%".$valSearch."%'";
    $search_Res = filterList($query);   
else:  
    $query = "SELECT * FROM `item_inventory`";
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
    <link rel="stylesheet" href="../css/inventory.css">
    <link rel="stylesheet" href="../others/bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    
	<title>Admin - Inventory</title>
</head>
<style>
    .btn {
     border: 1px solid black; 
     color:black;
}
</style>
<body>
    <div class="wrapper" style="overflow-x: scroll;">

        <?php require_once 'NavBar.php' ?>

        <div class="content">
            <?php require_once 'SideNavBar.php' ?>

            <div class="right">
                <div class="title">
                    <h2>Items<h2>
                </div>
                <style>
                    .search {
                        margin-bottom: 50px;
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
					<div id="borrower">
                       <!--<button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#borrower-modal">Add item</button> -->
                </div>
                    <!-- <button>Archive</button> -->
                </div>
		         <div class="content-container">
				
                    <div class="table" id=table_print>
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
                                        <td>Image</td>
                                        <td>Model</td>
                                        <td>Brand</td>
                                        <td>Category</td>
										<td>Quantity</td>
										<td>Quantity Left</td>
										<td>Status</td>
										<td>Action</td>
                                    </tr>
                                </thead>
                                <?php foreach($result_arr as $val) { ?>
                                    <tr class="text-center">
                                        <th><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($val['item_image']).'" 
                                                        height="90" width="150" id=img class="img-thumnail" />'; ?></th>
                                        <td ><?php echo $val['item_model']; ?></td>
                                        <td ><?php echo $val['item_brand']; ?></td>
                                        <td ><?php echo $val['item_category']; ?></td>
                                        <td ><?php echo $val['item_quantity']; ?></td>
                                        <td ><?php echo $val['item_quantity_left']; ?></td>
                                        <td ><?php echo $val['item_status']; ?></td>
                                        <td >
                                       
                                        <div class="dropdown">
                                            <button class="dropbtn">Action 
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                            <div class="dropdown-content">
                                                <?php echo "<a class=btn-e href='view_item.php?id=".$val['id']."'>Details</a>"; ?>
                                                <?php echo "<a class=btn-e href='edit_item.php?id=".$val['id']."'>Edit</a>"; ?>
                                                <?php echo "<a class=btn-e href='delete_item.php?id=".$val['id']."'>Delete</a>"; ?>
                                            </div>
                                        </div> 
                                        </td>
                                    </tr>
                                    <?php  }?>
                                 </form>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
		</div>
     
        <!-- Content END -->
	<div class="container">
	<div id="borrower-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<br><h3>Add Item</h3>
				</div>
				<form id="borrowerForm" name="borrower" role="form" method="POST" enctype="multipart/form-data">
					<div class="modal-body">				
					<div class="form-group">
					<table width=100%>
					<td>Serial ID
						<tr>
						<td colspan = 2><input type="text" name="serialNum" class="form-control"style="width:90%" required>
						<tr>
						<td>Item Image<td>Model
						<tr>
						<td><input type="file" name="item_image" id="itemImage"  class="form-control" style="width:80%" >
						<td><input type="text" name="item_model" class="form-control" style="width:80%" required>
						<tr>
						<td>Brand<td>Description
						<tr>
						<td><input type="text" name="item_brand" class="form-control" style="width:80%" required></td>
						<td><input type="text" name="item_desc" class="form-control" style="width:80%" required></td>
						<tr>
						<td>Category<td>Type
						<tr>
						<td><select class="form-control" name="item_category" style="width:80%" required>
								<option>--Select--</option>
                                <option value="Mic" <?php if ($catg == 'Mic') {  echo 'selected';} ?>>Mic</option>
                                <option value="Speaker" <?php if ($catg == 'Speaker') {  echo 'selected';} ?>>Speaker</option>   
                                <option value="Battery" <?php if ($catg == 'Battery') {  echo 'selected';} ?>>Battery</option>   
                                <option value="Projector" <?php if ($catg == 'Projector') {  echo 'selected';} ?>>Projector</option>
                            </select>
						<td><select class="form-control" name="item_type" style="width:80%" required>
                                <option>--Select--</option>
                                <option value="Consumable" <?php if ($catg == 'Consumable') {  echo 'selected';} ?>>Consumable</option>
                                
							</select>
						<tr>
						<td>Quantity<td>Status
						<tr>
						<td><input type="number" name="item_quantity" class="form-control" style="width:80%" required>
						<td><input type="Text" name="item_status" class="form-control" style="width:80%" required>
						</table>
						</div>
				</div>
                                    
					<div class="modal-footer">					
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<input type="submit" class="btn btn-success" name="accept" id="accept">
                        <?php 
                            if(isset($_POST['accept'])){
                                require_once("../db/db_connect.php");
                                // check image
                                if(empty($_FILES["item_image"]["tmp_name"])) :
                                else :
                                    $item_image = addslashes(file_get_contents($_FILES["item_image"]["tmp_name"]));
                                endif;
                                //Check Values
                                $serialNum = mysqli_real_escape_string($con , $_POST['serialNum']);
                                $item_model = mysqli_real_escape_string($con , $_POST['item_model']);
                                $item_brand = mysqli_real_escape_string($con , $_POST['item_brand']);
                                $item_desc = mysqli_real_escape_string($con , $_POST['item_desc']);
                                $item_category = mysqli_real_escape_string($con , $_POST['item_category']);
                                $item_type = mysqli_real_escape_string($con , $_POST['item_type']);
                                $item_quantity = mysqli_real_escape_string($con , $_POST['item_quantity']);
                                $item_status = mysqli_real_escape_string($con , $_POST['item_status']);
                                // insert in Database
                                $sql = "INSERT INTO `item_inventory`( `SerialID`, `item_image`, `item_model`, `item_brand`, 
                                `item_description`, `Type`, `item_category`, `item_quantity`, `item_quantity_left`, `item_status`) 
                                VALUES ('$serialNum','$item_image','$item_model','$item_brand','$item_desc','$item_type','$item_category','$item_quantity', '$item_quantity', '$item_status')";
                                
                                // save to db and check
                                if(mysqli_query($con, $sql)):
                                    // success
                                    echo '<script type="text/javascript">
                                            alert("Added Successfully!");
                                            window.location.href = "user-items.php";
                                        </script>';
                                else :
                                // error
                                echo 'Query error ' . mysqli_error($con);
                                endif;
                            }
                        ?>
					</div>
                </form>
			</div>
		</div>
	</div>	   		
</div>	
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
    // image
    $(document).ready(function(){  
      $('#accept').click(function(){  
           var image = $('#itemImage').val();   
           if(image == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension_image = $('#itemImage').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension_image, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#itemImage').val('');
                    return false;  
                }  
           }  
      });  
 });  
</script>