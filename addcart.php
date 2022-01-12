<?php
    require_once("userscript.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Ted's Tasty Taco Truck</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Ted's Tasty Taco Truck</h1>
        </header>
       <?php include("nav.html");?>
        
           
           <article>
           <h3>Item Details</h3>
            <form method="POST" action="precon.php">
           
               
                <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $itemId = $_POST["itemId"];
                    


                    require_once("connect-db.php");
                    $error = "";
                    
                    $sql = "select * from menuitems where itemId = :itemId";

                    $statement1 = $db->prepare($sql);
                    $statement1 -> bindValue(':itemId', $itemId);
                    
                    function test_input($data) {
                      $data = trim($data);
                      $data = stripslashes($data);
                      $data = htmlspecialchars($data);
                      return $data;
                    }

                    if($statement1->execute()){
                        $customers = $statement1->fetchAll();
                        $statement1->closeCursor();
                    }else{
                        $error = "Error finding item";
                    };
                 }
                ?>

                
                <?php    
                    foreach($customers as $c){?>
                        SKU (Item Id)
                        <input type="text" name="itemId" value="<?php echo $c["itemId"];?>"><br>
                        <br>
                        User Id (Test)
                        <input type="text" name="userId" value="<?php echo "{$_SESSION["userId"]}";?>"><br>
                        <br>
                        Item Name:
                        <input type="text" name="name" value="<?php echo $c["name"];?>" readonly>
                        <br><br>
                        Price:
                        <input type="text" name="price" value="<?php echo $c["price"];?>" readonly>
                        <br><br>
                        Quantity:
                        <input type="text" name="qty" required>
                        <br><br>
                        Description:
                        <input type="text" name="descr" value="<?php echo $c["descr"]?>" readonly>

                        <br><br>
                        
                        
                        
                      <?php } ?>

                        <input type="submit" value="Submit">

                      </form>
           
        </article>
        <?php include("navfooter.php");?>
    </div>
</body>

</html>
