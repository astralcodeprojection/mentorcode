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
        
      <h1 class="display-3 fw-bold">Login</h1><br><br><br>
      <div class="heading-line mb-1"></div>
    </div>
        <br><br>

  <!-- START THE DESCRIPTION CONTENT  -->
   
      <div class="row">
        <div class="col-md-6">
            <article class="left">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                Username: <input type="text" name="username">
                <br><br>
                Password: <input type="password" name="password">
                <br><br>
                
                <button type="submit" value="Submit">Submit</button>
            </form>
        </article>
        <?php
            require_once("connect-db.php");
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = $_POST["username"];
                $password = $_POST["password"];
                
                if($username == 'ted' && $password == 'ted'){
                        $userId = $_SESSION["userId"];
                        $_SESSION["admin_login"] = "true";
                        $_SESSION["logged_in"] = "true";
                    ?>
                <script type="text/javascript">
                    window.location = "admin.php";
                </script>
        <?php
                }
                if($username != 'ted'){
                $sql = "select * from users where username = :username and password = :password";
                    
                $statement1=$db->prepare($sql);
                
                $statement1->bindValue(':username', $username);
                $statement1->bindValue(':password', $password);
                 

                if ($statement1->execute()){
                    
                    $log = $statement1->fetchAll();
                    $statement1->closeCursor();

                    foreach ($log as $u=>$value){
                        print_r($value);
                        foreach($log as $u => $value){
                                foreach($value as $x => $v){
                                    if(is_string($v)) {
                                    
                                    $_SESSION[$x] = $v;
                                    // $_SESSION["logged_in"] = "true";
                                    //$_SESSION["$u"] = $value;
                                }
                                
                                if($v == $username && $v == $password){
                                    $_SESSION["logged_in"] = "true";
                                }
                            }
                        }
                
               
                    
                    
                    
        		?>
            <script type="text/javascript">
               // window.location.replace("olo.php");
            </script>
            <?php
                    }
                
                }
                }else{
                    $error = "Invalid username or password.";
                }
            }
            ?>
            <?php
                if($error !=""){
                    echo "<h3>$error</h3>";
                }
            ?>
        </div>
        <div class="col-md-6">
            <div class="bg-white p-4 text-start">
            <p class="fw-light">
                This page logs in and creates session variables that are used throughout the site.
            </p>
            </div>
        </div>
      </div>
  </div>
    <br><br><br>  <br><br><br>  <br><br><br>  <br><br>
      <?php include("navfooter.php");?>
</body>


</html>