<?php 

$con = mysqli_connect('localhost', 'u466928655_inventory', 'Ccs!@#45', 'u466928655_ict_equipement');

// sql to create table 
/*$sql = "CREATE TABLE view_borrowers (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Id_number VARCHAR(30) NOT NULL,
    name_borrowers VARCHAR(30) NOT NULL,
    year_sec VARCHAR(30) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

$sql = "CREATE TABLE item_inventory (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_image BLOB NOT NULL, 
    item_model VARCHAR(30) NOT NULL,
    item_brand VARCHAR(30) NOT NULL,
    item_category VARCHAR(30) NOT NULL,
    item_quantity INT(30) NOT NULL,
    item_quantity_left INT(30) NOT NULL,
    item_status VARCHAR(30) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

$sql = "CREATE TABLE borrowers (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    borrowers_id INT(9) NOT NULL,
    borrowers_fname VARCHAR(30) NOT NULL,
    borrowers_lname VARCHAR(30) NOT NULL,
    borrowers_gender VARCHAR(6) NOT NULL,
    borrowers_number INT(11) NOT NULL,
    borrwers_dept VARCHAR(30) NOT NULL,
    borrowers_type VARCHAR(30) NOT NULL,
    borrowers_year VARCHAR(30) NOT NULL,
    borrowers_section VARCHAR(30) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

$sql = "CREATE TABLE borrowed_item  (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    borrowed_serialID INT(9) NOT NULL,
    borrowed_name VARCHAR(30) NOT NULL,
    borrowed_room VARCHAR(30) NOT NULL,
    borrowed_item VARCHAR(30) NOT NULL,
    borrowed_quantity INT(30) NOT NULL, 
    borrowed_return_date VARCHAR(30) NOT NULL,
    borrowed_status VARCHAR(10) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

/*$sql = "CREATE TABLE admin_borrowed_item  (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    borrowed_serialID INT(9) NOT NULL,
    borrowed_name VARCHAR(30) NOT NULL,
    borrowed_room VARCHAR(30) NOT NULL,
    borrowed_item VARCHAR(30) NOT NULL,
    borrowed_quantity INT(30) NOT NULL, 
    borrowed_return_date VARCHAR(30) NOT NULL,
    borrowed_status VARCHAR(10) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

$sql = "CREATE TABLE returned_item  (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    borrowed_name VARCHAR(30) NOT NULL,
    borrowed_item VARCHAR(30) NOT NULL,
    borrowed_quantity INT(30) NOT NULL, 
    borrowed_borrowed_date VARCHAR(30) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

$sql = "CREATE TABLE reject_borrowed_item  (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    borrowed_serialID INT(9) NOT NULL,
    borrowed_name VARCHAR(30) NOT NULL,
    borrowed_room VARCHAR(30) NOT NULL,
    borrowed_item VARCHAR(30) NOT NULL,
    borrowed_quantity INT(30) NOT NULL, 
    borrowed_return_date VARCHAR(30) NOT NULL,
    borrowed_status VARCHAR(10) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

$sql = "CREATE TABLE user_account  (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    userID VARCHAR(30) NOT NULL,
    vkey VARCHAR(30) NOT NULL,
    password_user VARCHAR(30) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

$sql = "CREATE TABLE sem_certificate  (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    seminar_Name VARCHAR(30) NOT NULL,
    faculty VARCHAR(30) NOT NULL,
    Date_of_sem VARCHAR(30) NOT NULL,
    file_cert BLOB NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
*/

$result = mysqli_query($con, $sql);
// check connection
if(!$con && !$result){
    echo 'Connection Error: ' . mysqli_connect_error();
}
else {
    // echo "created succesfully";
}
?>
