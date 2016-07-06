<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
if(!isset($_REQUEST['to'])){
    print json_encode(array("error" => "Missing parameter 'to' please set to 'json' or 'hdf5'"));
} elseif ($_REQUEST['to'] !== 'json' && $_REQUEST['to'] !== 'hdf5'){
    print json_encode(array("error" => "Illegal value of 'to' parameter please set to 'json' or 'hdf5'"));
}