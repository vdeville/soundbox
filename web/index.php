<?php
require_once '../vendor/autoload.php';

$render = new Render('index');

$s = SoundManager::getAllSongs();

$render->render(['songs' => $s]);