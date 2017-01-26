<?php

session_start();

include("lib/lib-lock.php");

if (lock()) {



} else {



}

?>
