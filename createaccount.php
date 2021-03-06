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
        
      <h1 class="display-3 fw-bold">Account Creator</h1>
      <div class="heading-line mb-1"></div>
    </div>
        <br><br>

  <!-- START THE DESCRIPTION CONTENT  -->
   
      <div class="row">
        <div class="col-md-6">
            <article class="left">
            <h3>Create Account</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
                Username: <input type="text" name="username">
                <br><br>
                Password: <input type="password" name="password">
                <br><br>
                Email: <input type="email" name="email">
                <br><br>
                First Name: <input type="text" name="fname">
                <br><br>
                Last Name: <input type="text" name="lname">
                <br><br>
                Address: <input type="text" name="addr">
                <br><br>
                State: <input type="text" name="state">
                <br><br>
                Payment Method: <input type="text" name="paymethod">
                <br><br>
                
                <button type="submit" value="Submit">Submit</button>
            </form>
        </article>
        <article>
            <?php

            require_once("connect-db.php");
            $error = $success = $username = $password = $email = $fname = $lname = $addr = $state = $paymethod = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $addr = $_POST["addr"];
                $state = $_POST["state"];
                $paymethod = $_POST["paymethod"];
                
                
             $sql="insert into users (username, password, email, fname, lname, addr, state, paymethod) VALUES (:username, :password, :email, :fname, :lname, :addr, :state, :paymethod)";
                
                $statement1 = $db->prepare($sql);
                
                $statement1->bindValue(':username', $username);
                $statement1->bindValue(':password', $password);
                $statement1->bindValue(':email', $email);
                $statement1->bindValue(':fname', $fname);
                $statement1->bindValue(':lname', $lname);
                $statement1->bindValue(':addr', $addr);
                $statement1->bindValue(':state', $state);
                $statement1->bindValue(':paymethod', $paymethod);
                
                function test_input($data) {
                      $data = trim($data);
                      $data = stripslashes($data);
                      $data = htmlspecialchars($data);
                      return $data;
                    }
                
                if($statement1->execute()){
                    $statement1->closeCursor();
                    $success = "User successfully added.";
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
                Sign up for the ability to order online and get tacos at your doorstep!
            </p>
            </div>
        </div>
      </div>
  </div>
      <?php include("navfooter.php");?>
</body>


</html>
