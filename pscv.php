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
    
<?php include("nav.html");?>
<div class="container">
    <div class="row text-center">
        
      <h1 class="display-3 fw-bold">Hola</h1>
      <div class="heading-line mb-1"></div>
    </div>
        <br><br>

  <!-- START THE DESCRIPTION CONTENT  -->
   
      <div class="row">
        <div class="col-md-6">
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
        </div>
        <div class="col-md-6">
            <div class="bg-white p-4 text-start">
            <p class="fw-light">
                a 6 column text post a 6 column text post a 6 column text post a 6 column text post a 6 column text post a 6 column text post a 6 column text post a 6 column text post 
            </p>
            </div>
        </div>
      </div>
  </div>
      <?php include("navfooter.php");?>
</body>


</html>
