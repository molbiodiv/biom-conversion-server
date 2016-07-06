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
        // var_dump($results_obj);
        $this->assertEquals("b'No Table ID'", $results_obj["id"]);
        $this->assertEquals("Biological Observation Matrix 1.0.0", $results_obj["format"]);
        $this->assertEquals(array(3,1,12), $results_obj["data"][1]);
        $this->assertEquals("OTU_8", $results_obj["rows"][7]["id"]);
        $this->assertEquals("Sample_3", $results_obj["columns"][2]["id"]);
    }
}
