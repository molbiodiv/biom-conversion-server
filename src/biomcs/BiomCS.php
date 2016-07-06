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
        return $this->executeBiomCommand("--to-json", $content);
    }

    /**
     * Converts the content of a biom file to hdf5
     * @param $content mixed - content of a biom file to be converted to hdf5 (e.g. json)
     * @return string        - hdf5 encoded biom object
     */
    public function convertToHDF5($content)
    {
        return $this->executeBiomCommand("--to-hdf5", $content);
    }

    /**
     * Executes the biom command line tool with given parameter on the content (using temp files)
     *    and throws an exception if it fails
     * @param $parameter string - parameters to pass to 'biom convert ' command beside -i and -o (handled by filename).
     *                            e.g. "--to-json" or "--to-hdf5"
     * @param $content string   - content of a file
     * @throws \Exception if the command fails
     * @return string - content in the desired format
     */
    private function executeBiomCommand($parameter, $content)
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'biomcs');
        $writeFile = file_put_contents($tempFile, $content);
        if ($writeFile === false) {
            throw new \Exception("Could not write temporary file for conversion.");
        }
        $result = array();
        $errorCode = 0;
        exec('biom convert -i '.escapeshellarg($tempFile).
                ' -o '.escapeshellarg($tempFile).'.out '.escapeshellarg($parameter), $result, $errorCode);
        if ($errorCode !== 0) {
            throw new \Exception("Could not execute biom command: ".$result." ".$errorCode);
        }
        return file_get_contents($tempFile.".out");
    }
}
