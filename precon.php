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
            
            $error = $success = $itemId = $userId = $name = $price = $qty = $descr = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $itemId = $_POST["itemId"];
                $userId = $_POST["userId"];
                $name = $_POST["name"];
                $price = $_POST["price"];
                $qty = $_POST["qty"];
                $descr = $_POST["descr"];
                
             $sql = "insert into prepurchase (userId, name, price, qty, descr) VALUES (:userId, :name, :price, :qty, :descr)";
                
                $statement1 = $db->prepare($sql);
                
                $statement1->bindValue(':userId', $userId);
                $statement1->bindValue(':name', $name);
                $statement1->bindValue(':price', $price);
                $statement1->bindValue(':qty', $qty);
                $statement1->bindValue(':descr', $descr);
               
                // function test_input($data) {
                //       $data = trim($data);
                //       $data = stripslashes($data);
                //       $data = htmlspecialchars($data);
                //       return $data;
                //     }
                
                if($statement1->execute()){
                    $statement1->closeCursor();
                    $success = "Items added to Cart!";
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
