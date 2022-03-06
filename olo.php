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
                if (isset($_GET["page"])) { $page  = $_GET["page"]; } 
                else { $page=1; };
                 $start_from = ($page-1) * $results_per_page;
                $sql = "SELECT * FROM menuitems ORDER BY itemId ASC LIMIT $start_from, $results_per_page";
                $error1 = "";
            
                $statement1 = $db->prepare($sql);
                
            
                if($statement1->execute()){
                    $customers = $statement1->fetchAll();
                    $statement1->closeCursor();
                    
                }else{
                    $error1= "Error finding items.";
                }
            
               
            ?>
           <h2 >Menu Items</h2><br>
            <div class="cardComponent">
           <?php
                foreach($customers as $c){?>
                  <!-- foreach($customers as $c->fetch_assoc()){?>  -->
                    
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo $c["img"];?>" class="card-img-top" alt="...">
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
                    
                    
            <?php } ?>
            </div>
            <br><br><br>
           <?php
            require_once("connect-db.php");
            $sql3 = "SELECT COUNT(itemId) AS total FROM menuitems";  
                      
            $error3 = "";

            
            $statement3 = $db->prepare($sql3);
            
           
        
            if($statement3->execute()){
                $pagenation = $statement3->fetchAll();
                
                $statement3->closeCursor();
                 $total_pages = ceil($pagenation[0]["total"] / $results_per_page);
            
            echo "<a href='olo.php?page=".($page-1)."' class='button'>Previous  </a>"; 
            <a class="page-link <?= echo $page <= 1 ? 'disabled': ''; ?>" href="olo.php?page=<?= ($page-1);?>">PreviousTest</a>;
    
    

            for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                echo "<a href='olo.php?page=".$i."'";
                if ($i==$page)  echo " class='curPage'";
                echo ">".$i."</a> ";
            }    
            echo "<a href='olo.php?page=".($page+1)."' class='button'> NEXT</a>";
            <a class="page-link <?= echo $page >= $pages ? 'disabled': ''; ?>" href="olo.php?page=<?= ($page+1);?>">NextTest</a>;
            }else{
                $error3= "Error Loading.";
            }


           
        
            
        ?>
        </article>
        </div>

	
        
       
      </div>
  </div>
      <?php include("navfooter.php");?>
</body>

</html>
