<?php

use \Symfony\Component\Finder\Finder;
use \Symfony\Component\Finder\SplFileInfo;

/**
 * Class SoundManager
 */
class SoundManager
{
    /**
     * @return array
     */
    public static function getAllSongs()
    {
        $finder = new Finder();
        $songs = [];

        /** @var SplFileInfo $file */
        foreach ($finder->in(PUBLIC_PATH.SOUNDS_FOLDER)->files()->sortByName() as $file) {
            if (in_array($file->getExtension(), ALLOWED_EXTENSION)) {
                $songs[] = new Song($file);
            }
        }

        return $songs;
    }
}
