<!Doctype html>
<html>
<head>
  <title>ATN's Store</title>
<meta charset="UTF -8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
</head>
<body>

 <!-- Sidebar menu -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:50%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Home</a>
  <a href= "login.php" onclick="w3_close()" class="w3-bar-item w3-button">Login</a>
</nav>
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

 <!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-center w3-padding-16"> Welcome to ATN's store </div>
  </div>
     <table>
                 <tr>
        <?php 
        require_once 'Data.php';
   $sql = "SELECT * FROM product"; 
        $stmt = $pdo->prepare($sql); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
            foreach ($resultSet as $row) echo"$name
            "{
            ?>

  <tr>
    <th class="Bz"><?= $row['id']?></th>
    <th class="Bz"><?= $row['name']?></th>
    <th class="Bz"><?= $row['price']?></th>
    <th class="Bz"><?= $row['Description']?></th>
 <br>
  </tr>
  <tr>
  </tr>
<?php
?>


      </tr>
        </table>
</body>
</html>