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
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Ted's Tasty Taco Truck</h1>
        </header>
       <?php include("navadmin.html");?>
        <article class="left">
            <h3>Add Menu Item</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
                Item Name: <input type="text" name="name">
                <br><br>
                Price: <input type="text" name="price">
                <br><br>
                Description: <input type="text" name="descr">
                <br><br>
                
                <button type="submit" value="Submit">Submit</button>
            </form>
        </article>
        <article>
            <?php

            require_once("connect-db.php");
            $error = $success = $name = $price = $descr = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $name = $_POST["name"];
                $price = $_POST["price"];
                $descr = $_POST["descr"];
                
                
             $sql="insert into menuitems (name, price, descr) VALUES (:name, :price, :descr)";
                
                $statement1 = $db->prepare($sql);
                
                $statement1->bindValue(':name', $name);
                $statement1->bindValue(':price', $price);
                $statement1->bindValue(':descr', $descr);
                
                function test_input($data) {
                      $data = trim($data);
                      $data = stripslashes($data);
                      $data = htmlspecialchars($data);
                      return $data;
                    }
                
                if($statement1->execute()){
                    $statement1->closeCursor();
                    $success = "Item successfully added.";
                 }else{
                    $error="Error entering user.";
                };

        
        ?>
            <?php
                if($error !=""){
                    echo "<h3>$error</h3>";
                }else{
                    echo "<h3>$success</h3>";
                    
                }
                
        }//end of post
                ?>
          
            

            
        </article>
                <?php include("navfooter.php");?>

    </div>
</body>

</html>
