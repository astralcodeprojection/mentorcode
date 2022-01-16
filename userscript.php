<?php
// start the session
session_start();
echo $_SESSION["userId"];
if($_SESSION["userId"] = $u["userId"]){
    
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

