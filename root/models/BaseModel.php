<?php
class BaseModel
{
    protected $dataFile;

    public function __construct()
    {
    }

    protected function getData($filePath = 'data/master/master.json')
    {
        $data = file_get_contents($filePath);
        return json_decode($data, true);
    }
}
?>