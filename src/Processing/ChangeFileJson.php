<?php
namespace lib\ChangeFileJson;

require_once 'DataProcessingInterface.php';

use lib\DataProcessingInterface\DataProcessing;

class ChangeFileJson implements DataProcessing
{
    private $fileWay;

    public function __construct($fileWay)
    {
        $this->fileWay = $fileWay;
    }

    public function read():array
    {
        return json_decode(file_get_contents($this->fileWay), true);
    }
    public function write(array $arr):void
    {
        file_put_contents($this->fileWay, json_encode($arr, true));
        return;
    }
}
