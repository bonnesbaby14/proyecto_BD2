<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$connection = mysqli_connect(
 // 'localhost',
 'containers-us-west-36.railway.app',
  'root',
 // '1234567890',
 // 'se_ceti',
 '62gIGinYMUKWXoRUMRQr',
 'railway',
 5441
) or die(mysqli_erro($mysqli));

?>