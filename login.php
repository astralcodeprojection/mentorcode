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
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Ted's Tasty Taco Truck</h1>
        </header>
       <?php include("nav.html");?>
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
<<<<<<< HEAD
                    foreach ($log as $u=>$value){
                        print_r($value);
=======
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
                    foreach ($log as $u=>$value){
                    //    print_r($value);
>>>>>>> 4068b3e... Initializing and working with sass / scss
                        if(is_string($value)) {
                            $_SESSION[$u] = $value;
                            //$_SESSION["$u"] = $value;
                        }
                        echo $_SESSION['fname'];
                        //$_SESSION["$u"] = $u;
                        //echo $_SESSION[$u];
                        //$_SESSION[$log] = $u;
                        //echo $u["userId"];
                        //$_SESSION["userId"] = $u["userId"];
<<<<<<< HEAD
                        if($u["username"] == $username && $u["password"] == $password){
                            $_SESSION["logged_in"] = "true";
                        }
=======
                        
>>>>>>> 4068b3e... Initializing and working with sass / scss
                        
                        print_r($_SESSION["logged_in"]);
                    
                    
                    
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
         <?php include("navfooter.php");?>

    </div>
</body>

</html>
