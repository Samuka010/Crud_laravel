<?php
$cURL = curl_init('https://www.google.com/');
curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
$resultado = curl_exec($cURL);
curl_close($cURL);
echo $resultado;