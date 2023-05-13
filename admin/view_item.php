<?php 
// connect to db
require_once('../db/db_connect.php');
//Get id
$id = $_GET['id'];

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Item</title>
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
    .view_item {
        width: 70%;
        height: 1150%;
        background-color: lightblue;
        border-radius: 15px;
        margin-top: 10px;
        margin-left: 290px;
    }
    .add_quantity {
    }
    .text_input {
    background: transparent;
    border: none;
    font-size: 20px;
    text-align: left;
}
   
</style>
<body>
    
<?php include("NavBar.php"); ?>
<?php include("SideNavBar.php"); ?>
<form action="" method="POST">
      <div class="view_item">
            <div class="add_quantity">
               
                <input type="submit"  class="btn btn-info btn" name="back" value="Back">
                <div class="detail">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($item_image).'" 
                    height="300" width="100%" id=img class="img-thumnail" />'; ?>

                    Serial ID: <input type="text" class="text_input" value="<?php echo $serial_ID; ?>" readonly disabled>
                <br>    Model: <input type="text" class="text_input" value="<?php echo $item_model; ?>" readonly disabled>
                <br>    Category: <input type="text" class="text_input" value="<?php echo $item_category; ?>" readonly disabled>
                <br>    Brand: <input type="text" class="text_input" value="<?php echo $item_brand; ?>" readonly disabled>
                <br>    Description: <input type="text" class="text_input" value="<?php echo $item_description; ?>" readonly disabled>
                <br>    Quantity: <input type="text" class="text_input" value="<?php echo $item_quantity; ?>" readonly disabled>
                <br>    Quantity Left: <input type="text" class="text_input" value="<?php echo $item_quantity; ?>" readonly disabled>
                <br>    Type: <input type="text" class="text_input" value="<?php echo $item_type; ?>" readonly disabled>
                <br>    Status: <input type="text" class="text_input" value="<?php echo $item_status; ?>" readonly disabled>
                    
                </div>
            </div>
      </div>
      </form>
      <?php 
      if(isset($_POST['back'])){
        echo '<script>window.location="admin-items.php"</script>';
      }
      ?>
</body>
</html>