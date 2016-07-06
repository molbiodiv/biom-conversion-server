<?php

class ConvertTest extends \PHPUnit_Framework_TestCase
{
    public function testConvertWithMissingParameters()
    {
        $this->expectOutputRegex("/.*Missing parameter.*/");
        require __DIR__.'/../convert.php';
    }
    public function testConvertWithIllegalValue()
    {
        $this->expectOutputRegex("/.*Illegal value.*/");
        $_REQUEST['to'] = 'illegal';
        require __DIR__.'/../convert.php';
    }
    public function testConvertToJSON()
    {
        $_REQUEST['to'] = 'json';
        $_FILES = array(
            array(
                'name' => 'simpleBiom.hdf5',
                'type' => 'application/octet-stream',
                'size' => 33840,
                'tmp_name' => __DIR__ . '/files/simpleBiom.hdf5',
                'error' => 0
            )
        );
        $this->expectOutputRegex("/.*Biological Observation Matrix 1.0.0.*/");
        require __DIR__.'/../convert.php';
    }
}
