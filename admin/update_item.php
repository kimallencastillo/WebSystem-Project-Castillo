<?php 
    require_once("../db/db_connect.php");

    if(isset($_GET['id']) && isset($_POST['accept'])) {
    $id = $_GET['id'];
           // check image
            if(empty($_FILES["item_image"]["tmp_name"])) :
            else :
            // Get image
                $upt_image = addslashes(file_get_contents($_FILES["item_image"]["tmp_name"]));
            endif;
    // Get the updated Value
    $upt_SerialID = $_POST['serialNum'];
    $upt_model = $_POST['item_model'];
    $upt_brand = $_POST['item_brand'];
    $upt_desc = $_POST['item_desc'];
    $upt_category = $_POST['item_category'];
    $upt_type = $_POST['item_type'];
    $upt_quantity = $_POST['item_quantity'];
    $upt_status = $_POST['item_status'];

    // update query
    $upt_sql = "UPDATE `item_inventory` SET 
    `SerialID`='$upt_SerialID',
    `item_image`='$upt_image',
    `item_model`='$upt_model',
    `item_brand`='$upt_brand',
    `item_description`='$upt_desc',
    `Type`='$upt_type',
    `item_category`='$upt_category',
    `item_quantity`='$upt_quantity',
    `item_quantity_left` ='$upt_quantity',
    `item_status`='$upt_status' 
    WHERE id=$id ORDER BY created_at";

    // save to db and check
    if(mysqli_query($con, $upt_sql)):
    echo '<script type="text/javascript">
            alert("Updated Successfully!");
            window.location.href = "admin-items.php";                         
        </script>';
        exit;
    else:
        // error
        echo 'Query error ' . mysqli_error($con);
    endif;
    }else {
        // Go back to menu
        echo '<script type="text/javascript">
            window.location.href = "admin-items.php";                         
            </script>';
    }

?>