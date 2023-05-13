<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    
    .sidenav {
  				height: 100%;
  				width: 0;
  				position: fixed;
				z-index: 1;
				top: 0;
				right: 0;
				background-color: rgba(0,0,0,0.9);
				overflow-x: hidden;
				transition: 0.5s;
				padding-top: 60px;
	        }
			
			.sidenav a {
				padding: 10px 10px 10px;
				text-decoration: none;
				font-size: 25px;
				color: #818181;
				display: block;
				transition: 0.3s;
			}

			.sidenav a:hover {
				color: #f1f1f1;
			}

			.sidenav .closebtn {
				position: absolute;
				top: 0;
				right: 25px;
				font-size: 36px;
				margin-left: 50px;
			}

			
			#logout {
				position: relative;
				left:80px;
				bottom: 140px;
				margin-top: 750px;
			}

			#hambut {
				font-size:30px;
				cursor:pointer; 
				color: white;
			}

			#hambut:hover {
				color: #f1f1f1;
			}

            .nav {
  				position: absolute;
  				top: 2.8%;
  				left: 58.35%;
				right: 60%;
  				transform: translate(-50%, -50%);
  				z-index: 1;
  				width: 80%;
  				text-align: right;
			}
            #nvb a {
                float: left;
                color: #4e1d04;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
            }
            body {
                background-color: blue;
            }
</style>
<body>
    <form action="" method="POST">
        <input type="submit" name="submit"  value="CLICK ME!">
    </form>
    <?php 
   // if(isset($_POST['submit'])){ ?>

    <a href="" onclick="openNav()">CLICK ME!!</a>
<div class="nav">
	<span id=hambut onclick="openNav()" >&#9776;</span>
</div>

  <div id="mySidenav" class="sidenav">
  			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  			<?php include("UpdateTabBorrower.php") ?>
  </div>
  <?php //} ?>
</body>
</html>
<script>
    function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
	}

	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
</script>