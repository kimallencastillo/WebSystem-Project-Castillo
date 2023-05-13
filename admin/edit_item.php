<?php 
// connect to db
require_once('../db/db_connect.php');
//Get id
$id = $_GET['id'];
$upt_image = " ";

$sql ="SELECT * FROM item_inventory WHERE id=$id";
$result = mysqli_query($con, $sql);   
// check error
if($result->num_rows != 1) {
    die("ERROR 404");
}

$value = $result->fetch_assoc();
$serial_ID = $value['SerialID'];
$item_image = $value['item_image'];
$item_model = $value['item_model'];
$item_brand = $value['item_brand'];
$item_description = $value['item_description'];
$item_type = $value['Type'];
$item_category = $value['item_category'];
$item_quantity = $value['item_quantity'];
$item_quantity_left = $value['item_quantity_left'];
$item_status = $value['item_status'];
$item_date = $value['created_at'];

// BACK
if(isset($_POST['back']) || isset($_POST['cancel'])){
    echo '<script>window.location="admin-inventory.php"</script>';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <?php include_once '../others/font.php' ?>
    <link rel="stylesheet" href="../others/DataTables-1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/inventory.css">
    <link rel="stylesheet" href="../others/bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<style>
    .edit_item {
        width: 70%;
        height: 110%;
        background-color: lightblue;
        border-radius: 15px;
        margin-left: 290px;
    }
    .add_quantity {
    }
    .text_input {
    background: transparent;
    font-size: 20px;
    text-align: left;
}
   
</style>
<body>
    
<?php include("NavBar.php"); ?>
<?php include("SideNavBar.php"); ?>
    <form action="update_item.php?id=<?=$id?>" method="POST" enctype="multipart/form-data"> 
      <div class="edit_item">
      <div class="back">
        <input type="submit"  class="btn btn-info btn" name="back" value="Back">
       
      <div class="detail">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($item_image).'" 
                    height="250" width="100%" id=img class="img-thumnail" />'; ?>
               <div class="modal-body">				
					<div class="form-group">
					<table width=100%>
					<td>Serial ID
						<tr>
						<td colspan = 2><input type="text" name="serialNum" class="form-control" style="width:90%" value="<?php echo $serial_ID;?>">
						<tr>
						<td>Item Image<td>Model
						<tr>
						<td><input type="file" name="item_image" id="itemImage"  class="form-control" style="width:80%" >
						<td><input type="text" name="item_model" class="form-control" style="width:80%" value="<?php echo $item_model;?>" >
						<tr>
						<td>Brand<td>Description
						<tr>
						<td><input type="text" name="item_brand" class="form-control" style="width:80%" value="<?php echo $item_brand;?>"></td>
						<td><input type="text" name="item_desc" class="form-control" style="width:80%" value="<?php echo $item_description;?>"></td>
						<tr>
						<td>Category<td>Type
						<tr>
						<td><select class="form-control" name="item_category" style="width:80%" >
								<option value="<?php echo $item_category;?>"></option>
                                <option value="Mic" <?php if ($item_category == 'Mic') {  echo 'selected';} ?>>Mic</option>
                                <option value="Speaker" <?php if ($item_category == 'Speaker') {  echo 'selected';} ?>>Speaker</option>   
                                <option value="Battery" <?php if ($item_category == 'Battery') {  echo 'selected';} ?>>Battery</option>   
                                <option value="Projector" <?php if ($item_category == 'Projector') {  echo 'selected';} ?>>Projector</option>
                            </select>
						<td><select class="form-control" name="item_type" style="width:80%" >
                                <option value="<?php echo $item_type; ?>"></option>
                                <option value="Consumable" <?php if ($item_type == 'Consumable') {  echo 'selected';} ?>>Consumable</option>
                                
							</select>
						<tr>
						<td>Quantity<td>Status
						<tr>
						<td><input type="number" name="item_quantity" class="form-control" style="width:80%" value="<?php echo $item_quantity; ?>">
						<td><input type="Text" name="item_status" class="form-control" style="width:80%" value="<?php echo $item_status; ?>">
						</table>
				
                                    
					<div class="modal-footer">					
						<input type="submit" class="btn btn-default" name="cancel" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" name="accept" id="accept">
                </div>
                </div>
				</div>
        </div>
      </div>
      </form>
</body>
<?php 
?>
</html>
<script >
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