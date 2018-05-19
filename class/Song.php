<?php

/**
 * Class Song
 */
class Song
{
    private $splFile;

    /**
     * Song constructor.
     * @param SplFileInfo $file
     */
    public function __construct(SplFileInfo $file)
    {
        $this->splFile = $file;

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
     * @return mixed|string
     */
    public function __toString()
    {
        return $this->getName();
    }

}