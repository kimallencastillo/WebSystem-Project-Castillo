<?php 
// Downloads files
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //  connect to db
    require_once("../../db/db_connect.php");
    // fetch file to download from db
    $sql = "SELECT * FROM sem_certificate WHERE id=$id";
    $result = mysqli_query($con, $sql);

    $val = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $val['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $val['name']));
        readfile('uploads/' . $val['name']);

        // Now update downloads count
        $newCount = $val['downloads'] + 1;
        $updQuery = "UPDATE sem_certificate SET download=$newCount WHERE id=$id";
        mysqli_query($con, $upQuery);
        exit;
    }

}
?>