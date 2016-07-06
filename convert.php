<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
if(!isset($_REQUEST['to'])){
    print json_encode(array("error" => "Missing parameter 'to' please set to 'json' or 'hdf5'"));
}