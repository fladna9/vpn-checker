<?php
function getUserIP()
{
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }

    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    }
    else {
        $ip = $remote;
    }

    return $ip;
}

$user_ip = getUserIP();
$message = "Script encountered an error.";

switch ($user_ip) {
        case "IP1":
                $message = "✅   Connected through the VPN.";
                break;
        case "IP2":
                $message = "✅   Connected through the VPN.";
                break;
        default:
                $message = "⛔   You're not connected through the VPN. Your access will be limited.";
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<title>VPN Checker</title>
</head>
<body style="padding-top: 10px; padding-bottom: 10px;">
<div class="container">
<div class="jumbotron">
<h3><?php echo $message; ?></h3>
</div>
<div class="jumbotron">
<p>VPN Help / Tutorial / Message</p>
</div>
</div>
</body>
