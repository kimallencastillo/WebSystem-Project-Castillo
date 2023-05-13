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
    $status = $val['borrowed_status'];
    $status += 1;

    $upt_status = "UPDATE `borrowed_item` SET `borrowed_status`='1' WHERE id=$id";
    if(mysqli_query($con, $upt_status)):
        echo '<script type="text/javascript">
                alert("Approved Successfully!");
                window.location.href = "admin-borrowed-items.php";
              </script>';
    else :
        // error
        echo 'Query error ' . mysqli_error($con);
    endif;
}
?>