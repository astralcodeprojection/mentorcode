<?php
// start the session
session_start();
if($_SESSION["logged_in"] != "true"){
?>
<script>
    window.location.replace("login.php");
</script>
<?php
}
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
        <article class="left">

            <?php

                require_once("connect-db.php");
                $error1 = "";

                $sql = "select * from prepurchase WHERE userId = :userId";
            
                $statement1 = $db->prepare($sql);
                
            
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
                    <th>q</th>
                    
                
                    <th></th>
                </tr>
               
                <?php
                    foreach($customers as $c){?>
                <tr>
                    <td><?php echo $c["name"];?></td>
                    <td><?php echo $c["price"]." $";?></td>
                    
                    <td><?php echo $c["qty"];?></td>
                    
                    <td>
                        <form action="deletecartitem.php" method="post">
                            <input type="hidden" name="preId" value="<?php echo $c["preId"];?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    
                </tr>
                <?php } ?>
            </table>                 
            <br><br><br>
           <article>
           
          <div>
                        <form action="confirmpurchase.php" method="post">
                        
                        <button type="submit">Checkout</button>
                        </form>
              </div>
        </article>
        </article>
        
        <?php include("navfooter.php");?>

    </div>
</body>

</html>
