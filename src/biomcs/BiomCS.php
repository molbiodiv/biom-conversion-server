<?php
/**
 * Created by PhpStorm.
 * User: s216121
 * Date: 06.07.16
 * Time: 11:19
 */

namespace biomcs;


use Prophecy\Exception\Exception;

class BiomCS
{
    /**
     * Converts the content of a biom file to json
     * @param $content mixed - content of a biom file that should be converted to json (e.g. binary content of a hdf5 file)
     * @return string - json encoded biom object
     */
    public function convertToJSON($content){
        $temp_file = tempnam(sys_get_temp_dir(), 'biomcs');
        $write_file = file_put_contents($temp_file, $content);
        $json_string = "";
        if($write_file !== FALSE){
            $this->executeBiomCommand("--to-json", $temp_file);
            $json_string = file_get_contents($temp_file.".json");
        }
        return $json_string;
    }

    /**
     * Executes the biom command line tool with given parameter and filename and throws an exception if it fails
     * @param $parameter string - parameters to pass to 'biom convert ' command beside -i and -o which are handled by filename. E.g. "--to-json" or "--to-hdf5"
     * @param $filename string - the input
     * @throws \Exception if the command fails
     */
    private function executeBiomCommand($parameter, $filename){
        $result = array();
        $errorCode = 0;
        exec('biom convert -i '.escapeshellarg($filename).
                ' -o '.escapeshellarg($filename).'.json '.escapeshellarg($parameter), $result, $errorCode);
            if ($errorCode !== 0) {
                throw new \Exception("Could not execute biom command: ".$result." ".$errorCode);
            }
    }
}