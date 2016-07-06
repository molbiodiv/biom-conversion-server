<?php

namespace biomcs;

class BiomCSTest extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $biomcs = new BiomCS();
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

        // Test for conversion of biom content in HDF5 format
        $results = $biomcs->convertToJSON(file_get_contents(__DIR__ . '/../files/simpleBiom.hdf5'));
        $results_obj = json_decode($results, true);
        $this->assertEquals("None", $results_obj["id"]);
    }
}
