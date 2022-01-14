<?php
// start the session
session_start();

if($_SESSION["logged_in"] != "true"){
    
?>
<script>
    window.location.replace("login.php");
</script>
<?php
}
else{
    
    $_SESSION["userId"] = $userId;
    
}
?>
Test User Id Echo (session): <?php echo $_SESSION["userId"];?><br><br>
Test User Id Echo: <?php echo $userId;?><br><br>