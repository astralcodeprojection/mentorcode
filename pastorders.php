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
            <article class="left">

            <?php

                require_once("connect-db.php");
                $error1 = "";

                $sql = "select * from orders";
            
                $statement1 = $db->prepare($sql);
                
            
                if($statement1->execute()){
                    $customers = $statement1->fetchAll();
                    $statement1->closeCursor();
                }else{
                    $error1= "Error finding tickets.";
                }
            
               
            ?>
           <h3>Past Orders</h3>
            <table>
                <tr>
                 
                    <th>Order</th>
                    <th>Name</th>
                    <th>Addr</th>
                    <th>State</th>
                    <th>Price</th>
                    <th>Payment Method</th>
                </tr>
               
                <?php
                    foreach($customers as $c){?>
                <tr>
                    <td><?php echo $c["name"];?></td>
                    <td><?php echo $c["fname"];?></td>
                    <td><?php echo $c["addr"];?></td>
                    <td><?php echo $c["state"];?></td>
                    <td><?php echo $c["total"];?></td>
                    <td><?php echo $c["paymethod"];?></td>
                    
                </tr>
                <?php } ?>
            </table>                 
            <br><br><br><br>

            
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
