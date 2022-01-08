<?php
// start the session
session_start();
if($_SESSION["userId"] = $userId){
?>
<script>
    window.location.replace("login.php");
</script>
<?php
}
?>