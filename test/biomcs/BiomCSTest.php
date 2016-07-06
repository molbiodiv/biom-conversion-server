<?php

namespace biomcs;

class BiomCSTest extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        // Test for conversion of a simple biom file in HDF5 format
        $_FILES = array(
            array(
                'name' => 'simpleBiom.hdf5',
                'type' => 'application/octet-stream',
                'size' => 33840,
                'tmp_name' => __DIR__ . '/../files/simpleBiom.hdf5',
                'error' => 0
            )
        );
        $results = BiomCS->convert(array('to' => 'json', 'as' => 'stream'));
        $results_obj = json_decode($results, true);
        $this->assertEquals("None", $results_obj["id"]);
    }
}
