<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$connection = mysqli_connect(
  'containers-us-west-36.railway.app',
  'root',
  '62gIGinYMUKWXoRUMRQr',
  'se_ceti',
  5441
) or die(mysqli_erro($mysqli));

?>