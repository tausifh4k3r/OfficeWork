<?php
// proxy.php
$URL = $_POST['Url'];

// $externalLink = "https://info.microsoft.com/ww-landing-accelerate-sales-and-revenue-with-dynamics-365.html?LCID=ES";
echo file_get_contents($URL);
?>
