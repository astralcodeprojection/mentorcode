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
// else{
//     $_SESSION["userId"] = $userId;
// }
?>