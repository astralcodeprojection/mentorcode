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
      <div class="col-md-10">
            <img class="" src="img/maxresdefault.jpg">
      </div>
    </div>
      <div class="row">
        <div class="col-md-6">
            <article class="left">
            <h3>Add Menu Item</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
                Item Name: <input type="text" name="name">
                <br><br>
                Price: <input type="text" name="price">
                <br><br>
                Description: <input type="text" name="descr">
                <br><br>
                
                <button type="submit" value="Submit">Submit</button>
            </form>
        </article>
        <article>
            <?php

            require_once("connect-db.php");
            $error = $success = $name = $price = $descr = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $name = $_POST["name"];
                $price = $_POST["price"];
                $descr = $_POST["descr"];
                
                
             $sql="insert into menuitems (name, price, descr) VALUES (:name, :price, :descr)";
                
                $statement1 = $db->prepare($sql);
                
                $statement1->bindValue(':name', $name);
                $statement1->bindValue(':price', $price);
                $statement1->bindValue(':descr', $descr);
                
                function test_input($data) {
                      $data = trim($data);
                      $data = stripslashes($data);
                      $data = htmlspecialchars($data);
                      return $data;
                    }
                
                if($statement1->execute()){
                    $statement1->closeCursor();
                    $success = "Item successfully added.";
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
