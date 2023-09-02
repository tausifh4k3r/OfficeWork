<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
header('Access-Control-Max-Age: 600');

// proxy.php
$URL = $_POST['Url'];
// $externalLink = "https://info.microsoft.com/ww-landing-accelerate-sales-and-revenue-with-dynamics-365.html?LCID=ES";
echo file_get_contents($URL);

?>

