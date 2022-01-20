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
           <?php
                $userId = $_SESSION["userId"];
                require_once("connect-db.php");
                $error1 = "";

                $sql = "select * from prepurchase WHERE userId = :userId";
            
                $statement1 = $db->prepare($sql);
                $statement1 -> bindValue(':userId' , $userId);
                
            
                if($statement1->execute()){
                    $customers = $statement1->fetchAll();
                    $statement1->closeCursor();
                }else{
                    $error1= "Error finding tickets.";
                }
            
               
            ?>
           <h3>Cart Contents</h3>
            <table>
                <tr>
                 
                    <th>Menu Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>User</th>
                
                     
                </tr>
               
                <?php
                    foreach($customers as $c){
                        $total = $total + ($c["price"]*$c["qty"]);
                        ?>
                <tr>
                    
                    <td name="name"><?php echo $c["name"];?></td>
                    <td name="price"><?php echo $c["price"]." $";?></td>
                    
                    <td name="qty"><?php echo $c["qty"];?></td>
                    <td name="userId"><?php echo $c["userId"];?></td>
                    
                    
                    
                </tr>
                <?php } ?>
            </table>  
                <br><br><br>First Name:
                        <input type="text" name="fname" required>
                        <br><br>
                        Last Name:
                        <input type="text" name="lname" required>
                        <br><br>
                        Address:
                        <input type="text" name="addr" required>
                        <br><br>
                        State:
                        <input type="text" name="state" required>
                        <br><br>
                        Total:
                        <input type="text" name="total" value=<?php echo $total;?> required>
                        <br><br>
                        Payment:
                        <input type="radio" name="paymethod" value="Debit Card">Debit Card
                        <input type="radio" name="paymethod" value="Credit Card">Credit Card
                        <input type="radio" name="paymethod" value="Cash">Cash
                        <br><br>
            <br><br><br>
           
           
          <div>
                        <form action="pscv.php" method="post">
                        
                        <button type="submit">Place Order</button>
                        </form>
              </div>
        </article>
        <?php include("navfooter.php");?>

    </div>
</body>

</html>
