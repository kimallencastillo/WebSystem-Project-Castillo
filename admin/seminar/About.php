<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.about {
    width: 75%;
    height: 100px;
    border-radius: 15px;
    margin-top: 20px;
    margin-left: 270px;
}
</style>
</head>
<body>
  
<?php include("SemNavBar.php"); ?>
<?php include("SideNavBarCert.php"); ?>
<div class="about">
<div class="about-section">
  <h1>About</h1>
  <p>Who we are and what we do.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="../../img/Kim.jpg" alt="Kim" style="width:100%;">
      <div class="container">
        <h2>Kim Castillo</h2>
        <p class="title">Leader</p>
        <p>Focused on Database and Internal Functions</p>
        <p>kimallen.castillo@perpetual.edu.ph</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="../../img/Claude.jpg" alt="Claudine" style="width:100%;">
      <div class="container">
        <h2>Claudine Castro</h2>
        <p class="title">Art Director Developer</p>
        <p>Focused on the Enhancement of the System</p>
        <p>claudinejoy.castro@perpetual.edu.ph</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="../../img/Wesley.jpg" alt="Wesley" style="width:100%;">
      <div class="container">
        <h2>Wesley Decipeda</h2>
        <p class="title">Layout Producer</p>
        <p>Focused on the Base of the System and Layouts</p>
        <p>jaywesley.decipeda@perpetual.edu.ph</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
