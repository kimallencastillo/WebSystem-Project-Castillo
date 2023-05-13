<?php 
//  Check Id
if(isset($_GET['id'])){
    // connect DB
    require_once('../db/db_connect.php');
    //  GET id
    $id = $_GET['id'];


    $sql_borrowed = "SELECT * FROM `borrowed_item` WHERE id=$id";
    $result_borrowed = mysqli_query($con, $sql_borrowed);

    //  check error
    if($result_borrowed->num_rows !=1):
        die("404");
    endif;

    //  get value
    $val = $result_borrowed->fetch_assoc();
    $item_serialID = $val['borrowed_item'];
    $borrowed_name = $val['borrowed_serialID'].' '.$val['borrowed_name'];
    $returned_item = $val['borrowed_item']. '-' . $val['item_category'];
    $borrowed_quantity = $val['borrowed_quantity'];
    $borrowed_date = $val['created_at'];

    //  Get serial ID of an item
    $sql_item = "SELECT * FROM `item_inventory` WHERE SerialID=$item_serialID";
    //  result
    $result_item = mysqli_query($con, $sql_item);
    //  check error
    if($result_item->num_rows !=1):
         echo '<script type="text/javascript">
        	alert("The item has already been removed");
        	window.location.href = "admin-borrowed-items.php";
      		</script>';
    endif;
    //  fetch array
    $item = $result_item->fetch_assoc();
    $item_quan_left = $item['item_quantity_left'];
    $upt_quan_left = $item_quan_left + $borrowed_quantity;

    //  Update
    $sql_item_upd_quantity = "UPDATE `item_inventory` SET `item_quantity_left`='$upt_quan_left' WHERE SerialID=$item_serialID";
    
    $sql_return = "INSERT INTO `returned_item`(`borrowed_name`, `borrowed_item`, `borrowed_quantity`,
    `borrowed_date`) VALUES ('$borrowed_name','$returned_item','$borrowed_quantity','$borrowed_date')";

    $sql_borrowed_delete = "DELETE FROM `borrowed_item` WHERE id=$id";
    if(mysqli_query($con, $sql_return) && mysqli_query($con, $sql_item_upd_quantity) && mysqli_query($con, $sql_borrowed_delete)):
        echo '<script type="text/javascript">
                alert("Return Successfully!");
                window.location.href = "user-returned-items.php";
              </script>';
    else :
        // error
        echo 'Query error ' . mysqli_error($con);
    endif;
    
}
?>