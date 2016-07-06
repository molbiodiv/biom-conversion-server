<?php

class ConvertTest extends \PHPUnit_Framework_TestCase
{
    public function testConvertWithMissingParameters()
    {
        $this->expectOutputRegex("/.*Missing parameter.*/");
        require __DIR__.'/../convert.php';
    }
}
