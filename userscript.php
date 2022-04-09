<?php
// start the session
session_start();
echo "In here";
echo $_SESSION["userId"];
echo $_SESSION["logged_in"];
echo $_SESSION["userId"];
$_SESSION["guest_login"] = "true";

?>

