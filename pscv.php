<?php
session_start();
    require_once("userscript.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Ted's Tasty Taco Truck</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
 
<body>
    <div class="container">
        <header>
            <h1>Ted's Tasty Taco Truck</h1>
        </header>
       <?php include("nav.html");?>
        <article>
            <?php

            require_once("connect-db.php");
            $error = $success = $name = $total = $fname = $userId = $lname = $addr = $state = $paymethod = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                $name = $_POST["name"];
    
                
                $price = $_POST["total"];
                $userId = $_SESSION["userId"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $addr = $_POST["addr"];
                $state = $_POST["state"];
                $paymethod = $_POST["paymethod"];
                
             $sql = "insert into orders ( total, userId, fname, lname, addr, state, paymethod) VALUES (:total, :userId, :fname, :lname, :addr, :state, :paymethod)";
                
                $statement1 = $db->prepare($sql);
                
                // $statement1->bindValue(':name', $name);
                $statement1->bindValue(':total', $price);
                $statement1->bindValue(':userId', $userId);
                $statement1->bindValue(':fname', $fname);
                $statement1->bindValue(':lname', $lname);
                $statement1->bindValue(':addr', $addr);
                $statement1->bindValue(':state', $state);
                $statement1->bindValue(':paymethod', $paymethod);
                // echo $statement1;
                function test_input($data) {
                      $data = trim($data);
                      $data = stripslashes($data);
                      $data = htmlspecialchars($data);
                      return $data;
                    }
                
                if($statement1->execute()){
                    $statement1->closeCursor();
                    $success = "Order Placed!";

                    $cartClear ="delete * from prepurchase WHERE userId = :userId";

                    $statement2 = $db->prepare($cartClear);

                    $statement2->bindValue(':userId', $userId);

                    if($statement2->execute()){
                        echo "Cart Cleared - Test Passed";
                    }else{
                        echo "Cart test failed";
                    }

                 }else{
                    $error="Error entering request.";
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
