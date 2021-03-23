<?php
session_start();
session_destroy();
$SESSION = array();
header('location:login.php');