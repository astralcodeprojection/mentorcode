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
       <?php include("nav.html");?>
        <article class="left">

            <h2>Online Order</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            
            
                <input type="checkbox" name="name" value="Cheese Quesadilla">Cheese Quesadilla - 7$
                <p>A blend of traditional cheeses melted in a flour totilla.</p>


                <input type="checkbox" name="name" value="Chicken Quesadilla">Chicken Quesadilla - 7$
                <p>A blend of traditional cheeses with grilled chicken melted in a flour totilla.</p>


                <input type="checkbox" name="name" value="Pollo con Arroz">Pollo con Arroz - 9$
                <p>Rice topped with cheese coupled with seasoned grilled chicken</p>


                <input type="checkbox" name="name" value="Enchiladas">Enchiladas - 7$
                <p>A cheese topped beef enchilada that is paired with a traditional spicy red sauce.</p>


                <input type="checkbox" name="name" value="Beef Tacos">Beef Tacos - 6$
                <p>A pair of beef tacos topped with lettuce and cheese.</p>


                <input type="checkbox" name="name" value="Steak Tacos">Steak Tacos - 8$
                <p>A pair of steak tacos topped with lettuce and cheese.</p>


                <input type="checkbox" name="name" value="Flan">Flan - 3$
                <p>Traditional tapioca dessert suitable for any occasion</p>


                <input type="checkbox" name="name" value="Cafecito">Pan Dulce - 4$
                <p>A pastry type sweet that is filled with fruit filling</p>


                <input type="checkbox" name="name" value="Cafecito">Cafecito - 2$
                <p>A shot of sweetened espresso served out of a traditional cafetera</p>


                <input type="checkbox" name="name" value="Cafe con Leche">Cafe con Leche - 3$
                <p>Espresso served in milk that is perfect for enjoying a early morning</p>


                <h3>Delivery Info</h3>


                First Name:<input type="text" name="fname">
                <br>
                <br>
                Last Name:<input type="text" name="lname">
                <br>
                <br>
                Address:<input type="text" name="addr">
                <br>
                <br>
                State:<input type="text" name="state">
                <input type="text" name="total" value="test" hidden>
                <br>
                <br>
                Payment Method:
                <br><br>
                <input type="radio" name="paymethod" value="Credit Card">Credit Card
                <br><br>
                <input type="radio" name="paymethod" value="Cash on Delivery">Cash on Delivery
                <br><br><br><br><br>

            
                <button type="submit" value="Submit">Submit</button>
            </form>
            
        </article>
        <article>
            <?php

            require_once("connect-db.php");
            $error = $success = $name = $total = $fname = $lname = $addr = $state = $paymethod = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $name = $_POST["name"];
                $total = $_POST["total"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $addr = $_POST["addr"];
                $state = $_POST["state"];
                $paymethod = $_POST["paymethod"];
                
                
             $sql="insert into orders (name, total, fname, lname, addr, state, paymethod) VALUES (:name, :total, :fname, :lname, :addr, :state, :paymethod)";
                
                $statement1 = $db->prepare($sql);
                
                $statement1->bindValue(':name', $name);
                $statement1->bindValue(':total', $total);
                $statement1->bindValue(':fname', $fname);
                $statement1->bindValue(':lname', $lname);
                $statement1->bindValue(':addr', $addr);
                $statement1->bindValue(':state', $state);
                $statement1->bindValue(':paymethod', $paymethod);
                
                if($statement1->execute()){
                    $statement1->closeCursor();
                    $success = "??? successfully added.";
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
