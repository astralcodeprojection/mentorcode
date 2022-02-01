<?php
// start the session
session_start();
//echo $_SESSION["userId"];
//echo $_SESSION["logged_in"];
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
echo $_SESSION["userId"];
>>>>>>> 4068b3e... Initializing and working with sass / scss
=======

>>>>>>> 5e71e49... Initializing and working with sass / scss
=======

>>>>>>> main
if($_SESSION["logged_in"] != "true"){
    
?>
<script>
    window.location.replace("login.php");
</script>
<?php
}

?>

