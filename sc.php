<?php
error_reporting(E_ALL);

if (isset($_GET['req'])) {
    $url = $_GET['req'];
} else {
    echo 'You cannot open this file directly. It must be called by the generated JavaScript code.';
    exit;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0');
$data = curl_exec($ch);

if ($data === false) {
    echo 'Error: '.curl_error($ch);
    curl_close($ch);
    exit;
}

curl_close($ch);
echo 'content: '.$data;
