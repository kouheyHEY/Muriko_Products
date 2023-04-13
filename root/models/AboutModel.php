<?php
class AboutModel extends BaseModel
{
    public function getAbout()
    {
        $data = $this->getData(FILEPATH_ABOUT);
        return $data;
    }
}
?>