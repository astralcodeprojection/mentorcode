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
    <div class="container">
        <header>
            <h1>Ted's Tasty Taco Truck</h1>
        </header>
       <?php include("navadmin.html");?>
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
                    <th>Update Item</th>
                    <th>Delete Item</th>
                </tr>
               
                <?php
                    foreach($customers as $c){?>
                <tr>
                    <td><?php echo $c["name"];?></td>
                    <td><?php echo $c["price"]." $";?></td>
                    <td><?php echo $c["descr"];?></td>
                    <td>
                        <form action="updatemenuitem.php" method="post">
                            <input type="hidden" name="itemId" value="<?php echo $c["itemId"];?>">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                    <td>
                        <form action="deletemenu.php" method="post">
                            <input type="hidden" name="itemId" value="<?php echo $c["itemId"];?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    
                </tr>
                <?php } ?>
            </table>                 
            <br><br><br>
           
        </article>
        <?php include("navfooter.php");?>

    </div>
</body>

</html>
