<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style2.css">
    <title>Add</title>
</head>

<body>
    <div class="content">
        <h1>Product management form</h1>
        <?php 
        require("dbconnector.php");   
        if(isset($_POST["submit"]))
            {
                $name = $_POST["proname"];
                $price = $_POST["price"];
                $descrip = $_POST["descrip"];
                if ($name == ""||$price == ""|| $descrip == "") 
                    {
                        ?>
                        <script>
                            alert("Product information cannot be blank!!");
                        </script>
                        <?php
                    }
                else
                    {
                        $sql = "select * from product where proname='$name'";
                        $query = pg_query($conn, $sql);
                        if(pg_num_rows($query)>0)
                        {
                        ?> 
                            <script>
                                alert("The product already available!!");
                            </script>
                        <?php
                        }
                        else
                        {
                            $sql = "INSERT INTO product(proname, price, descrip) VALUES ('$name','$price','$descrip')";
                            pg_query($conn,$sql);
                            ?> 
                                <script>
                                    alert("Added successful!");
                                    window.location.href = "index.php";
                                </script>
                            <?php
                        }
                    }
            }
             ?>
        <form action="add.php" method="POST">
            <input class="input-information" type="text" width="300" height="100" name="proname" placeholder="Name"> <br>
            <input class="input-information" type="text" width="300" height="100" name="price" placeholder="Price"> <br>
            <input class="input-information" type="text" width="300" height="100" name="descrip" placeholder="Description"> <br>
            <button type="submit" value="Add" name="submit">Add</button>
            <button><a href="index.php">Back</a></button>
        </form>
        <table>
         <table>
               <tr>
                 <th>ID</th>
                 <th>Name</th>
                 <th>Price</th>
                 <th>Description</th>
               </tr>
                 <tr>
        <?php
            require_once 'Data.php';
            $sql = "SELECT * FROM product"; 
        $stmt = $pdo->prepare($sql); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
            foreach ($resultSet as $row) {
            ?>
  <tr>
    <th class="Bz"><?= $row['productid']?></th>
    <th class="Bz"><?= $row['proname']?></th>
    <th class="Bz"><?= $row['price']?></th>
    <th class="Bz"><?= $row['descrip']?></th>
 <br>
  </tr>
  <tr>
  </tr>
<?php
}
?>

      </tr>
      </table>
    </div>
</body>

</html>