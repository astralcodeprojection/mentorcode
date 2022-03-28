<?php
session_start();
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
        
      <h1 class="display-3 fw-bold">Menu</h1>
      <div class="heading-line mb-1"></div>
    </div>
        <br><br>

  <!-- START THE DESCRIPTION CONTENT  -->
   
      <div class="row">
        <div class="col-md-12">
            <article class="left">
            <h3>Filters<h3><br>
            
            <?php

                require_once("connect-db.php");
                
                $sql0 = "SELECT * FROM menuitems";
                $error0 = "";
            
                $statement0 = $db->prepare($sql);
                
            
                if($statement0->execute()){
                    $categories = $statement0->fetchAll();
                    $statement0->closeCursor();
                    
                }else{
                    $error0= "Error finding items.";
                }
            
               
            ?>
            <div class="cardComponent">
           
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catagories
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php
                        foreach($catagories as $c){?>
                    
                            <a class="dropdown-item" href="#"><?php echo$c["catagory"];?></a>
                         <?php } ?>
                    </div>
                </div>
                
            </div>
            <br>
            <?php

                require_once("connect-db.php");
                
                $sql9 = "SELECT * FROM menuitems";
                $error9 = "";
            
                $statement9 = $db->prepare($sql);
                
            
                if($statement9->execute()){
                    $meal = $statement9->fetchAll();
                    $statement9->closeCursor();
                    
                }else{
                    $error9= "Error finding items.";
                }
            
               
            ?>
            <div class="cardComponent">
           
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Meal Type
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php
                        foreach($meal as $c){?>
                    
                            <a class="dropdown-item" href="#"><?php echo$c["mealType"];?></a>
                         <?php } ?>
                    </div>
                </div>
                
            </div>
            <br><br>
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
            <div class="row">
                <div class="col-md-4">
                  
                </div>
                <div class="col-md-4">
                  <?php
                        require_once("connect-db.php");
                        $sql3 = "SELECT COUNT(itemId) AS total FROM menuitems";  
                                
                        $error3 = "";

                        
                        $statement3 = $db->prepare($sql3);
                        
                    
                    
                        if($statement3->execute()){
                            $pagenation = $statement3->fetchAll();
                            
                            $statement3->closeCursor();
                            $total_pages = ceil($pagenation[0]["total"] / $results_per_page);
                        
                       // echo "<a href='olo.php?page=".($page-1)."' class='button text-secondary fw-bold'>Previous  </a>"; 
                        ?>
                        <?php
                        if($page <= 1) {
                        ?>
                        <a class="page-link disabled">PreviousTest </a>
                        <?php } else{ ?>
                            <a class="page-link" href="olo.php?page=<?= ($page-1);?>">Previous </a>
                        <?php } ?>
                        <?php
                        for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                            echo "<a href='olo.php?page=".$i."' class=text-secondary ";
                            if ($i==$page)  echo " class='curPage text-secondary '";
                            echo ">".$i."</a> ";
                        }    
                        //echo "<a href='olo.php?page=".($page+1)."' class='button text-secondary fw-bold'> Next</a>";
                        }else{
                            $error3= "Error Loading.";
                        }
                        ?>
                        <?php
                        if($page == $total_pages) {
                        ?>
                        <a class="page-link disabled">NextTest </a>
                        <?php } else{ ?>
                            <a class="page-link" href="olo.php?page=<?= ($page+1);?>">Next </a>
                        <?php } ?>
                   
                </div>
                <div class="col-md-4">
                  
                </div>
            </div>
           
        </article>
        </div>

	
        
       
      </div>
  </div>
      <?php include("navfooter.php");?>


</html>
