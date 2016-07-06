<?php

namespace biomcs;

class BiomCS
{
    /**
     * Converts the content of a biom file to json
     * @param $content mixed - content of a biom file to be converted to json (e.g. binary content of a hdf5 file)
     * @return string        - json encoded biom object
     */
    public function convertToJSON($content)
    {
        $temp_file = tempnam(sys_get_temp_dir(), 'biomcs');
        $write_file = file_put_contents($temp_file, $content);
        $json_string = "";
        if ($write_file !== false) {
            $this->executeBiomCommand("--to-json", $temp_file);
            $json_string = file_get_contents($temp_file.".out");
        }
        return $json_string;
    }

    /**
     * Converts the content of a biom file to hdf5
     * @param $content mixed - content of a biom file to be converted to hdf5 (e.g. json)
     * @return string        - hdf5 encoded biom object
     */
    public function convertToHDF5($content)
    {
        $temp_file = tempnam(sys_get_temp_dir(), 'biomcs');
        $write_file = file_put_contents($temp_file, $content);
        $json_string = "";
        if ($write_file !== false) {
            $this->executeBiomCommand("--to-hdf5", $temp_file);
            $json_string = file_get_contents($temp_file.".out");
        }
        return $json_string;
    }

    /**
     * Executes the biom command line tool with given parameter and filename and throws an exception if it fails
     * @param $parameter string - parameters to pass to 'biom convert ' command beside -i and -o (handled by filename).
     *                            e.g. "--to-json" or "--to-hdf5"
     * @param $filename string  - the input
     * @throws \Exception if the command fails
     */
    private function executeBiomCommand($parameter, $filename)
    {
        $result = array();
        $errorCode = 0;
        exec('biom convert -i '.escapeshellarg($filename).
                ' -o '.escapeshellarg($filename).'.out '.escapeshellarg($parameter), $result, $errorCode);
        if ($errorCode !== 0) {
            throw new \Exception("Could not execute biom command: ".$result." ".$errorCode);
        }
    }
}
