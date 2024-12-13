<?php
session_start();

session_unset();
session_destroy();

header("Location: BOTH/loginAs.html");
exit;
?>
