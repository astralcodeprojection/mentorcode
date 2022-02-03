<?php
    require_once("userscript.php");
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
    <div class="container">
        <header>
            <h1>Ted's Tasty Taco Truck</h1>
        </header>
       <?php include("nav.html");?>
        <article class="left">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $preId = $_POST["preId"];
                    
                    require_once("connect-db.php");
                    $sql = "delete from prepurchase where preId = $preId";
                    
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
        <?php include("navfooter.php");?>

    </div>
</body>

</html>
