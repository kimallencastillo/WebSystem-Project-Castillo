<?php 
$room = $borrower = $item = "";

include("../db/db_connect.php");

$borrower_arr = array();
$item_arr = array();

$query_borrowers =  "SELECT * FROM `borrowers`";
$query_item =  "SELECT * FROM `item_inventory`";
$result_borrowers = mysqli_query($con, $query_borrowers);
$result_item = mysqli_query($con, $query_item);
//  get the value borrowers
while($row = mysqli_fetch_array($result_borrowers)) :
  $borrower_arr[] = $row;  
endwhile;
//  get the value item
while($row = mysqli_fetch_array($result_item)) :
  $item_arr[] = $row;  
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
	<link rel="stylesheet" href="newtransac.css">
    <title>ICT Equipments - Transaction</title>
</head>
<body>
    <div class="wrapper">

        <?php require_once 'NavBar.php' ?>

        <div class="content">

            <?php require_once 'SideNavBar.php' ?>

            <div class="right">
                <div class="title">
                    <h2>Borrow Item/s</h2>
                </div>
				
    <div class="testbox">
      <form action="" method="POST">
        <h4>Select Borrower<span>*</span></h4>
        <select id="borrower" class="form-select" name="borrower">
              <option value="">Please select borrower...</option>
              <?php foreach($borrower_arr as $val) : ?>
              <option value="<?php echo $val['id']; ?>" <?php if ($borrower == $val['id']) {  echo 'selected';} ?>><?php echo $val['borrowers_id'] .'--'. $val['borrowers_fname']. ' '. $val['borrowers_lname']; ?></option>
              <?php endforeach; ?>
        </select>
        <h4>Select Item<span>*</span></h4>
        <select id="item" class="form-select" name="item">
			      <option value="">Please select item...</option>
            <?php foreach($item_arr as $val) : ?>
              <?php //  Check the quantity if 0
                    if($val['item_quantity_left'] <= 0) :
                    else:?>
            <option value="<?php echo $val['id']; ?>" <?php if ($borrower == $val['id']) {  echo 'selected';} ?>><?php echo $val['SerialID'] .' '. $val['item_category']. ' :: '. $val['item_model']. ' :: '. $val['item_quantity_left']. ' in stock :: '. $val['item_status']; ?></option>
            <!--Serial Number Category :: Model :: Qty left :: Status -->
            <?php endif; endforeach;?>
        </select>
        <h4>Select Room<span>*</span> &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp Time Limit<span>*</span></h4>
        <div class="title-block">
          <select id="item" class="form-select" name="room">
            <option value="">Please select room...</option>
            <option value="CCS Office" <?php if ($room == 'CCS Office') {  echo 'selected';} ?>>CCS Office</option>
		   </select>
       &nbsp &nbsp &nbsp
          <input class="date" input type="datetime-local" name="date" required>
        </div>
        <div class="btn-block">
          <input type="submit" class="btn btn-success" name="accept">
        </div>
      </form>
      <?php 
        if(isset($_POST['accept'])){
          $borrower =  mysqli_real_escape_string($con , $_POST['borrower']);
          $item =  mysqli_real_escape_string($con , $_POST['item']);
          $room =  mysqli_real_escape_string($con , $_POST['room']);
          $date =  mysqli_real_escape_string($con , $_POST['date']);
          $name =  $serialID = $item_ID = $item_model = $item_category = $item_serialID = $quantity = "";
          foreach($borrower_arr as $val) :
            if($borrower === $val['id']):
              $name = $val['borrowers_fname'] .' '. $val['borrowers_lname'];
              $serialID = $val['borrowers_id'];
              break;
            endif;
          endforeach;
          $add_quantity = 1;
          
          foreach($item_arr as $val) :
            if($item === $val['id']):
              $item_model = $val['item_model'];
              $item_category = $val['item_category'];
              $item_serialID = $val['SerialID'];
              $quantity_left = $val['item_quantity_left'] - $add_quantity;
            endif;
          endforeach;
          

          $sql_insert = "INSERT INTO `borrowed_item`(`borrowed_serialID`, `borrowed_name`, 
          `borrowed_room`,
           `borrowed_item`,  `item_category`, `item_model`, `borrowed_quantity`, 
           `borrowed_return_date`) 
           VALUES ('$serialID','$name','$room','$item_serialID','$item_category','$item_model','$add_quantity','$date')";
           
           $sql_update_quantity_left = "UPDATE `item_inventory` SET `item_quantity_left`='$quantity_left' WHERE id=$item";
           // save to db and check
           if(mysqli_query($con, $sql_insert) && mysqli_query($con, $sql_update_quantity_left)):
            // success
            echo '<script type="text/javascript">
                    alert("Added Successfully!");
                    window.location.href = "user-borrowed-items.php";
                </script>';
        else :
        // error
        echo 'Query error ' . mysqli_error($con);
        endif;
        }
      ?>
    </div>
  </body>
</html>
            </div>
        </div>
        <!-- Content END -->
    
   </div>
    <!-- Wrapper END -->
</body>
</html>