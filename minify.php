<?php

require './vendor/autoload.php';
use MatthiasMullie\Minify;

/*~~~~~~~~~~JavaScript~~~~~~~~~~*/
$sourcePath = './js/main.js';
$minifier = new Minify\JS($sourcePath);

// save minified file to disk
$minifiedPath = './dist/js/main.js';
$minifier->minify($minifiedPath);

$sourcePath = './js/imageLoad.js';
$minifier = new Minify\JS($sourcePath);

// save minified file to disk
$minifiedPath = './dist/js/imageLoad.js';
$minifier->minify($minifiedPath);



/*~~~~~~~~~~CSS~~~~~~~~~~*/
/* Movie.css */
$sourcePath = './css/movie.css';
$minifier = new Minify\CSS($sourcePath);

$minifiedPath = './dist/css/movie.css';
$minifier->minify($minifiedPath);

/* Category.css */
$sourcePath = './css/category.css';
$minifier = new Minify\CSS($sourcePath);

$minifiedPath = './dist/css/category.css';
$minifier->minify($minifiedPath);

/* Category.css */
$sourcePath = './css/mobile.css';
$minifier = new Minify\CSS($sourcePath);

$minifiedPath = './dist/css/mobile.css';
$minifier->minify($minifiedPath);

echo 'Minified Successfully';