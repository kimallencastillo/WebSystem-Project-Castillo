<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
	<style>
        body {
            font-family: "Lato", sans-serif;
        }
        /* Fixed sidenav, full height */
        
        .sidenav {
            height: 120%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
            margin-top:50px;
        }
        /* Style the sidenav links and the dropdown button */
        
        .sidenav a,
        .dropdown-btn {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            outline: none;
        }
        
        .sidenav a:hover,
        .dropdown-btn:hover {
            color: #f1f1f1;
        }
        
        .main {
            margin-left: 200px;
            /* Same as the width of the sidenav */
            font-size: 20px;
            /* Increased text to enable scrolling */
            padding: 0px 10px;
        }
        
        .active {
            background-color:#094987;
            color: white;
        }
        
        .dropdown-container {
            display: none;
            background-color: #262626;
            padding-left: 8px;
        }
        /* Optional: Style the caret down icon */
        
        .fa-caret-down {
            float: right;
            padding-right: 8px;
        }
        /* Some media queries for responsiveness */
        
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }
            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <div class="sidenav">
        <button class="dropdown-btn">Transaction 
				<i class="fa fa-caret-down"></i>
			</button>
        <div class="dropdown-container">
            <a href="NewCertificate.php">New Certificate</a>
            <!--<a href="#">Update Certificate</a>-->
        </div>
        
		<a href="viewCert.php">View Certificates</a>
		<a href="recordCert.php">Records</a>
		
        <!--<button class="dropdown-btn">Record
				<i class="fa fa-caret-down"></i>
			</button>
        <div class="dropdown-container">
            <a href="#">Attendace</a>
            <a href="#">Event</a>
        </div>-->

    </div>
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>