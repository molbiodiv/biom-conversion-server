<?php

namespace test;

require_once __DIR__.'/overload_header_function.php';

class ConvertTest extends \PHPUnit_Framework_TestCase
{
    public function testConvertWithMissingTo()
    {
        $_REQUEST['content'] = 'bla';
        $this->expectOutputRegex("/.*Missing parameter.*/");
        require __DIR__ . '/../convert.php';
    }
    public function testConvertWithMissingContent()
    {
        unset($_REQUEST['content']);
        $_REQUEST['to'] = 'json';
        $this->expectOutputRegex("/.*Missing parameter.*/");
        require __DIR__.'/../convert.php';
    }
    public function testConvertWithIllegalValue()
    {
        $this->expectOutputRegex("/.*Illegal value.*/");
        $_REQUEST['content'] = 'bla';
        $_REQUEST['to'] = 'illegal';
        require __DIR__.'/../convert.php';
    }
    public function testConvertToJSON()
    {
        $_REQUEST['to'] = 'json';
        $_REQUEST['content'] = file_get_contents(__DIR__ . '/files/simpleBiom.hdf5');
        $this->expectOutputRegex("/.*Biological Observation Matrix 1.0.0.*/");
        require __DIR__.'/../convert.php';
    }
    public function testConvertToHDF5()
    {
        $_REQUEST['to'] = 'hdf5';
        $_REQUEST['content'] = file_get_contents(__DIR__ . '/files/simpleBiom.json');
        $this->expectOutputRegex("/\"error\": null/");
        require __DIR__.'/../convert.php';
    }
    public function testConvertFail()
    {
        $_REQUEST['to'] = 'hdf5';
        $_REQUEST['content'] = "bla";
        $this->expectOutputRegex("/does not appear to be a BIOM file/");
        require __DIR__.'/../convert.php';
    }
}
