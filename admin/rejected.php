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

    // borrowed item
    $sql_borrowed = "SELECT * FROM `borrowed_item` WHERE id=$id";
    $result_borrowed = mysqli_query($con, $sql_borrowed);

    //  check error
    if($result_borrowed->num_rows !=1):
        die("404");
    endif;

    //  get value
    $val = $result_borrowed->fetch_assoc();
    $b_serialID = $val['borrowed_serialID'];
    $b_name = $val['borrowed_name'];
    $b_room = $val['borrowed_room'];
    $b_item = $val['borrowed_item'];
    $b_category = $val['item_category'];
    $b_model = $val['item_model'];
    $b_quantity = $val['borrowed_quantity'];
    $b_return_date = $val['borrowed_return_date'];
    $b_status = $val['borrowed_status'];
    $borrowed_quantity = $val['borrowed_quantity'];

    // insert value 
    $reject_request = "INSERT INTO `reject_borrowed_item`
    (`id_reject`, `borrowed_serialID`, `borrowed_name`, 
    `borrowed_room`, `borrowed_item`, `borrowed_quantity`, 
    `borrowed_return_date`, `borrowed_status`) 
    VALUES ('$id','$b_serialID','$b_name','$b_room','$b_item','$b_quantity','$b_return_date','$b_status')";

    //  Get serial ID of an item
    $sql_item = "SELECT * FROM `item_inventory` WHERE SerialID=$item_serialID";
    //  result
    $result_item = mysqli_query($con, $sql_item);
    //  check error
    if($result_item->num_rows !=1):
        die("404_1");
    endif;
    //  fetch array
    $item = $result_item->fetch_assoc();

    $item_quan_left = $item['item_quantity_left'];
    $upt_quan_left = $item_quan_left + $borrowed_quantity;

    //  Update
    $sql_item_upd_quantity = "UPDATE `item_inventory` SET `item_quantity_left`='$upt_quan_left' WHERE SerialID=$item_serialID";
    $sql_delete_br_item = "DELETE FROM `borrowed_item` WHERE id=$id";
    
    if(mysqli_query($con, $reject_request) && mysqli_query($con, $sql_delete_br_item) && mysqli_query($con, $sql_item_upd_quantity) ):
        echo '<script type="text/javascript">
                alert("Reject Successfully!");
                window.location.href = "admin-borrowed-items.php";
              </script>';
    else :
        // error
        echo 'Query error ' . mysqli_error($con);
    endif;
}
?>