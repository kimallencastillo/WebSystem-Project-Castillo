<!DOCTYPE html>
<html>
<style>
body, html {
  height: 100%;
  margin: 0;
}
.bgimg {
  background-image: url("../img/bg.png");
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-family: "Courier New", Courier, monospace;
  font-size: 30px;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
.button {
  border: none;
  color: blue;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  background-color: white;
  color: black;
  border: 2px solid #555555;
  border-radius: 8px;
}

.button:hover {
  background-color: Blue;
  color: white;
}
.button1:hover {
  background-color: Blue;
  color: white;
}
.btnm {
  position: absolute;
  top: 60%;
  left: 43%;
  transform: translate(-50%, -50%);
}
.btnm1 {
  position: absolute;
  top: 60%;
  left: 57%;
  transform: translate(-50%, -50%);
}
.logout	{
	position: absolute;
	right: 1%;
}
</style>
<body>

<div class="bgimg">
  <div class="topleft">
	
  </div>
  <div class="middle">
    <h1>WELCOME!</h1>
  </div>
  <a href = "user-transaction.php"><button class="button btnm">Borrower</button>
  <button class="button btnm1"> <a href="seminar/NewCertificate.php">File Manager</button>
  <a href="../index.php"><img src="../img/Logout.png" class="logout" name="submit" width="100" height="48"></a> 
</div>

</body>
</html>
