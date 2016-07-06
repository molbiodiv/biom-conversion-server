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
        print $biomcs->convertToJSON($content);
    }
}