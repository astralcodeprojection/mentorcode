<?php
// start the session
session_start();
if($_SESSION["admin_login"] != "true"){
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
    <link href="https://fonts.googleapis.com/css?family=Itim|Lilita+One&display=swap" rel="stylesheet">
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
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $itemId = $_POST["itemId"];
                    
                    require_once("connect-db.php");
                    $sql = "delete from menuitems where itemId = $itemId";
                    
                    $statement1=$db->prepare($sql);
                    
                    if($statement1->execute()){
                        $statement1->closeCursor();
                        $success = "Successfully deleted item.";
                    }else{
                        $error = "Error deleting item";
                    }
                }
            ?>
            
            <?php
                if($error != ""){
                    echo $error;
                }else{
                    echo $success;
                }
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
