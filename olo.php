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
        
      <h1 class="display-3 fw-bold">Order for Delivery</h1>
      <div class="heading-line mb-1"></div>
    </div>
        <br><br>

  <!-- START THE DESCRIPTION CONTENT  -->
   
      <div class="row">
        <div class="col-md-12">
            <article class="left">

            <?php

                require_once("connect-db.php");
                $error1 = "";

                $sql = "select * from menuitems";
            
                $statement1 = $db->prepare($sql);
                
            
                if($statement1->execute()){
                    $customers = $statement1->fetchAll();
                    $statement1->closeCursor();
                }else{
                    $error1= "Error finding tickets.";
                }
            
               
            ?>
           <h3>Menu Items</h3>

           <?php
                foreach($customers as $c){?>
                    <div class="contentCard">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $c["name"];?></h5>
                                <h5 class="card-title"> <?php echo $c["price"]." $";?></h5>
                                <p class="card-text"><?php echo $c["descr"];?></p>
                                <form action="addcart.php" method="post">
                                    <input type="hidden" name="itemId" value="<?php echo $c["itemId"];?>">
                                    <button class="btn btn-primary" type="submit">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </diu>
                    
            <?php } ?>
                   
            <br><br><br>
           
        </article>
        </div>
       
      </div>
  </div>
      <?php include("navfooter.php");?>
</body>

</html>
