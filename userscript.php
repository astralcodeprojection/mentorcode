<?php
// start the session
session_start();
//echo $_SESSION["userId"];
//echo $_SESSION["logged_in"];

if($_SESSION["logged_in"] != "true"){
    
?>
<script>
    window.location.replace("login.php");
</script>
<?php
}

?>

