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
        <div class="col-md-7">
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
            <table>
                <tr>
                 
                    <th>Menu Item</th>
                    <th>Price</th>
                    <th>Description</th>
                
                    <th></th>
                </tr>
               
                <?php
                    foreach($customers as $c){?>
                <tr>
                    <td><?php echo $c["name"];?></td>
                    <td><?php echo $c["price"]." $";?></td>
                    
                    <td><?php echo $c["descr"];?></td>
                    
                    <td>
                        <form action="addcart.php" method="post">
                            <input type="hidden" name="itemId" value="<?php echo $c["itemId"];?>">
                            <button type="submit">More Details</button>
                        </form>
                    </td>
                    
                </tr>
                
                <?php } ?>
            </table>                 
            <br><br><br>
           
        </article>
        </div>
        <div class="col-md-5">
            <div class="bg-white p-4 text-start">
            <p class="fw-light">
                This is an extremely meta description for a online website that processess data in place of what should of, and potentially could have been great site art.
            </p>
            </div>
        </div>
      </div>
  </div>
      <?php include("navfooter.php");?>
</body>

</html>
            <!-- <a class="page-link <?= echo $page <= 1 ? 'disabled': ''; ?>" href="olo.php?page=<?= ($page-1);?>">PreviousTest</a>; -->
            <?php
                if($page <= 1) {
            ?>
            <a class="page-link disabled" $href="olo.php?page=<?= ($page-1);?>">PreviousTest </a>;
            <?php } else{ ?>
                <a class="page-link" $href="olo.php?page=<?= ($page-1);?>">PreviousTest </a>;
            <?php } ?>

            <a class="page-link <?= echo $page >= $pages ? 'disabled': ''; ?>" href="olo.php?page=<?= ($page+1);?>">NextTest</a>;
            echo "<a $page >= $pages ? 'disabled': ''; ?>" href="olo.php?page=<?= ($page+1);?>">NextTest</a>";
