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
       <?php include("navadmin.html");?>
        <article>
            <?php

            require_once("connect-db.php");
            $error = $success = $itemId = $name = $price = $descr = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $itemId = $_POST["itemId"];
                $name = $_POST["name"];
                $price = $_POST["price"];
                $descr = $_POST["descr"];
                
                
             $sql="update menuitems set itemId = :itemId, name = :name, price = :price, descr = :descr where itemId = itemId";
                
                $statement1 = $db->prepare($sql);
                
                $statement1->bindValue(':itemId', $itemId);
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
