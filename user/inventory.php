<?php 
$valSearch = "";
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
    <title>Inventory</title>
</head>
<style>
    * {
        border-collapse: collapse;
    }
    .sample1 ,.t1, .tr{
        border-collapse: collapse;
        border: 1px solid black;
        width: 85%;
        margin-top: 50px;
    }
    .sample1 {
        margin-bottom: 20px;
    }
    .inventory {
        width: 70%;
        height: 1150%;
        border: 1px solid black;
        background-color: lightblue;
        border-radius: 15px;
        margin-top: 20px;
        margin-left: 290px;
    }
    .pr {
        float: left;
        margin-top: 28px;
        margin-left: 60px;
        border-collapse: collapse;
    }
    .search {
        float: right;
        margin-top: 28px;
        margin-right: 60px;
    }
    .t1 {
        text-align: center;
        font-weight: bold;
    }
    .add_item {
        float: right;
        margin-right: 10%;
        margin-top: 15px;
    }
</style>
<body>
    <?php include("template/NavBar_borrowers.php"); ?>
    <div class="add_item">
    <form action="" method="POST">
        <input type="submit" name="add_item" value="+Add Item" class="add_item_btn"> 
    </form>
    </div>
    <h4 style="text-align: center; margin-right: 50%">Inventory</h4>
   
    <div class="inventory" >
        <div class="pr">
        <button class="print">Print</button>
        </div>
        <div class="search">
        <form action="" method="POST">
             Search
			<input type="text" name="search" class="" placeholder="Enter Book Name to Search..." value="<?php echo $valSearch; ?>" >
            <!--Submit-->
			<input type="Submit" name="submit" class="">
            <input type="Submit" name="clear" value="Clear" class="">
            <?php 
            if(isset($_POST['clear'])){
                $valSearch = " ";
            }
            ?>
            </form>
        </div>
    <form action="" method="POST">
    <table class="sample1" align="center">
     <tr class="tr">
         <td class="t1">Image</td>
         <td class="t1">Model</td>
         <td class="t1">Brand</td>
         <td class="t1">Category</td>
         <td class="t1">Quantity</td>
         <td class="t1">Quantity Left</td>
         <td class="t1">Status</td>
         <td class="t1">Action</td>
     </tr>
     <?php foreach($result_arr as $val) {?>
        <tr>
        <th><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($val['item_image']).'" 
         height="90" width="150" id=img class="img-thumnail" />'; ?></th>
        <td ><?php echo $val['item_model']; ?></td>
        <td ><?php echo $val['item_brand']; ?></td>
        <td ><?php echo $val['item_category']; ?></td>
        <td ><?php echo $val['item_quantity']; ?></td>
        <td ><?php echo $val['item_quantity_left']; ?></td>
        <td ><?php echo $val['item_status']; ?></td>
        <td ><?php echo "<a class=btn-e href='view_item.php?id= ". $val['id'] ."'>Details</a>"; ?>
        <input type="hidden" name="id_to_delete" value="<?php echo $val['id']; ?>">
        <input type="submit" name="Edit" value="Edit">
        <input type="submit" name="delete" value="delete">
        </td>
        </tr>
    <?php }?>
    </table>
    </div>
    </form>
</body>
<?php include("template/Footer.php"); ?>
</html>

<?php 
if(isset($_POST['delete'])) {
    $id_to_delete = $_POST['id_to_delete'];
    require_once("../db/db_connet.php");
    $sql_delete = "DELETE FROM item_inventory WHERE id=$id_to_delete";
    if(mysqli_query($con, $sql_delete)):
        // success
        // echo 'Success';
        // header('location : inventory.php');
        echo '<script type="text/javascript">
                        alert("Deleted Successfully!");
                        window.location.href = "inventory.php";
        </script>';
    else:
        echo 'query error ', mysqli_error($con);
    endif; 
}

?>