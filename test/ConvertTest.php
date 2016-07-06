<?php

class ConvertTest extends \PHPUnit_Framework_TestCase
{
    public function testConvertWithMissingParameters()
    {
        $_REQUEST['content'] = 'bla';
        $this->expectOutputRegex("/.*Missing parameter.*/");
        require __DIR__.'/../convert.php';
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
}
