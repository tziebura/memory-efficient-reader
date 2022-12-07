<?php

use App\FileExtensionBasedFileReaderFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$basePath   = __DIR__ . '/..';
// 6 seconds, peak memory usage 0.51MB
$fileCsv    = $basePath . '/var/data/input.csv';
// 109 seconds, peak memory 1.06MB
$fileXlsx   = $basePath . '/var/data/input.xlsx';
$factory    = new FileExtensionBasedFileReaderFactory();

$filePath = $fileCsv;

$start = time();
echo 'Current memory usage: ' . round(memory_get_usage() / 1024 / 1024, 2) . ' MB'. PHP_EOL;
$reader      = $factory->getFileReader($filePath);
$generator   = $reader->read($filePath);
echo 'Current memory usage: ' . round(memory_get_usage() / 1024 / 1024, 2) . ' MB'. PHP_EOL;

foreach ($generator as $index => $row) {
//    echo sprintf('Row #%s: %s' . PHP_EOL, $index, json_encode($row));
//    echo 'Current memory usage: ' . round(memory_get_usage() / 1024 / 1024, 2) . ' MB'. PHP_EOL;
}

echo 'Total time to read data: ' . (time() - $start) . 'seconds.' . PHP_EOL;
echo 'Peak memory usage: ' . round(memory_get_usage() / 1024 / 1024, 2) . ' MB'. PHP_EOL;