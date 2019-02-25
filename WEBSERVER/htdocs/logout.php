<?php
session_start();
session_destroy();
array_map('unlink', glob("./temp/*.csv"));
header ("Location: index.php");
?>