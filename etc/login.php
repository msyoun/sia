<?php

session_start();
$_SESSION = $_POST;
header("location:../");

?>
