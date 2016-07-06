<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
$to = isset($_REQUEST["to"]) ? $_REQUEST["to"] : false;
$content = isset($_REQUEST["content"]) ? $_REQUEST["content"] : false;
if(!$to || !$content){
    print json_encode(array("error" => "Missing parameter 'to' please set to 'json' or 'hdf5'"));
} elseif ($to !== 'json' && $to !== 'hdf5'){
    print json_encode(array("error" => "Illegal value of 'to' parameter please set to 'json' or 'hdf5'"));
} else {
    $biomcs = new \biomcs\BiomCS();
    if($to === "json"){
        print json_encode(array("content" => json_decode($biomcs->convertToJSON($content), true), "error" => null), JSON_PRETTY_PRINT);
    } elseif($to === "hdf5"){
        var_dump($content);
        print json_encode(array("content" => base64_encode($biomcs->convertToHDF5($content)), "error" => null), JSON_PRETTY_PRINT);
    }
}