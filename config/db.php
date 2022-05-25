<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$connection = mysqli_connect(
  'localhost',
  'root',
  '',
  'se_ceti'
) or die(mysqli_erro($mysqli));

?>