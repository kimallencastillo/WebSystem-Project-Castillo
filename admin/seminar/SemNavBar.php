<?php 
session_start();

$username = $_SESSION['username'];
$usernameID= $_SESSION['userID'];
$type_user = $_SESSION['type'];
$vkey_user = $_SESSION['vkey'];

?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			body {
			  margin: 0;
			}

			.topnav {
			  overflow: hidden;
			  background-color: #333;
			}

			.topnav a {
			  float: left;
			  color: #f2f2f2;
			  text-align: center;
			  padding: 14px 16px;
			  text-decoration: none;
			  font-size: 17px;
			  
			}
			
			.topnav a:hover {
			  background-color: #ddd;
			  color: black;
			}

			.topnav a.active {
			  background-color: #1E90FF;
			  color: white;
			}

			.topnav-right {
			  float: right;
			}
		</style>
		 <?php include_once '../../others/font.php' ?>
	</head>
	<body>
		<div class="topnav">
			<a class="active" href="../welcome-page.php">Home</a>
			<a href="../admin-transaction.php">Borrowers</a>
			<div class="topnav-right">
				<a href="#"><?php echo $username?> (<?php echo $type_user; ?>)</a>
				<a href="About.php">About</a>
				<a href="../../index.php">Logout</a>
			</div>
		</div>
	</body>
</html>