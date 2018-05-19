<?php

/**
 * Class Song
 */
class Song
{
    private $splFile;

    private $color;

    /**
     * Song constructor.
     * @param SplFileInfo $file
     */
    public function __construct(SplFileInfo $file)
    {
        $this->splFile = $file;
        $this->color = '#' . substr(md5($this->getName()), 0, 6);
    }

    /**
     * @return mixed|string
     */
    public function getName() {
        $str = $this->splFile->getBasename('.' . $this->splFile->getExtension());
        $str = str_replace('_', ' ', $str);
        $str = str_replace('-', ' ', $str);

        return $str;
    }

    /**
     * @return string
     */
    public function getPublicPath() {
        return '/' . SOUNDS_FOLDER . $this->splFile->getFilename();
    }

    /**
     * @return string
     */
    public function getColor(){
        return $this->color;
    }

    /**
     * @return mixed|string
     */
    public function __toString()
    {
        return $this->getName();
    }

}