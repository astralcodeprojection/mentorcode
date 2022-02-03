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
           <h3>Update Menu Item</h3>
            <form method="POST" action="menuadmin.php">
           
               
                <?php 
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $ticketId = $_POST["ticketId"];
                    


                    require_once("connect-db.php");
                    $error = "";
                    
                    $sql = "select * from ticket where ticketId = :ticketId";

                    $statement1 = $db->prepare($sql);
                    $statement1 -> bindValue(':ticketId', $ticketId);
                    
                    

                    if($statement1->execute()){
                        $customers = $statement1->fetchAll();
                        $statement1->closeCursor();
                    }else{
                        $error = "Error finding ticket";
                    };
                 }
                ?>

                
                <?php    
                    foreach($customers as $c){?>
                        <input type="hidden" name="ticketId" value="<?php echo $c["ticketId"];?>">
                        Ticket Date
                        <input type="text" name="ticketDate" value="<?php echo $c["ticketDate"];?>" readonly>
                        Artist
                        <input type="text" name="artist" value="<?php echo $c["artist"];?>" readonly>

                        Total
                        <input type="text" name="total" value="<?php echo $c["price"]*2;?>" readonly>

                        <br><br>
                        First Name:
                        <input type="text" name="fname" required>
                        <br><br>
                        Last Name:
                        <input type="text" name="lname" required>
                        <br><br>
                        Address:
                        <input type="text" name="addr" required>
                        <br><br>
                        City:
                        <input type="text" name="city" required>
                        <br><br>
                        Phone:
                        <input type="tel" name="phone" required>
                        <br><br>
                        Email:
                        <input type="email" name="email" required>
                        <br><br>
                        Payment:
                        <input type="radio" name="payment" value="Gold">Gold
                        <input type="radio" name="payment" value="Silver">Silver
                        <input type="radio" name="payment" value="Diamonds">Diamonds
                        <br><br>
                        
                      <?php } ?>

                        <input type="submit" value="Submit">

                      </form>
           
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
