<?php
// start the session
session_start();
//echo $_SESSION["userId"];
//echo $_SESSION["logged_in"];
<<<<<<< HEAD
=======
echo $_SESSION["userId"];
>>>>>>> 4068b3e... Initializing and working with sass / scss
if($_SESSION["logged_in"] != "true"){
    
?>
<script>
    window.location.replace("login.php");
</script>
<?php
}

?>

