<?php
require_once("xml.php");
$secret = 1234;
$n = filter_input(INPUT_GET, "n");
$sigTMP = hash("SHA256", $n . $secret);
$xmlparser = new XMLSerializer();

if ($sigTMP === filter_input(INPUT_GET, "s")) {
    $response = ["n" => 2 * $n]; 
    }
else {
    $response = ["err" => "signature not valid"];
    }

$mask = filter_input(INPUT_GET, "m");
$mask_arr = explode(".", $mask);
$valid = true;

if (isset($mask_arr[0]) && isset($mask_arr[1])) {

    for ($i = 0; $i < 3; $i++) {
        if ($mask_arr[$i] != 255) {
            break;
        }
    }

    for ($e = $i; $e < 3; $e++) {
        if ($mask_arr[$i] < $mask_arr[$e]) {
            $valid = false;
        }
    }

    if (!($i == 4 || $mask_arr[$i] == 128 || $mask_arr[$i] == 192 || $mask_arr[$i] == 224 || $mask_arr[$i] == 240 || $mask_arr[$i] == 248 || $mask_arr[$i] == 252 || $mask_arr[$i] == 254 || $mask_arr[$i] == 0)) {
        $valid = false;
    }
} else {
    $response = ["err" => "invalid input"];
    $valid = false;
}


$output = [ "response" => $response, "valid" => $valid ];
if (isset($_GET["format"])&&$_GET["format"]=="xml") {
    header('Content-Type: application/xml; charset=utf-8');
    echo $xmlparser->generateValidXmlFromArray($output);
} else {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($output);
}

?>