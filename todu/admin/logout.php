<?php

include ('../includes/dbconnect.php');

session_start();

session_unset();

session_destroy();

header("location: {$hostname}/admin/")


?>
