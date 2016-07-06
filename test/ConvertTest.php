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
}
