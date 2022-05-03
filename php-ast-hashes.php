<?php
declare(strict_types=1);

require 'util.php';

$version = (int)$argv[1];
$paths_file = $argv[2];
$hashes_file = $argv[3];

$paths = file_get_contents($paths_file);
if ($paths === false) {
    exit(1);
}
$paths = trim($paths);
$paths = explode("\n", $paths);

$hashes = '';
foreach ($paths as $path) {
    $hash = '';
    if (file_exists($path)) {
        $ast = ast\parse_file($path, $version);
        $hash = md5(ast_dump($ast));
    }
    $hashes .= "{$hash},{$path}\n";
}
file_put_contents($hashes_file, $hashes);
