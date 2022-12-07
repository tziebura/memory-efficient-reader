<?php

namespace App;

use App\Reader\CsvReader;
use App\Reader\FileReader;
use App\Reader\XlsxReader;
use InvalidArgumentException;

final class FileExtensionBasedFileReaderFactory implements FileReaderFactory
{
    public function getFileReader(string $filePath): FileReader
    {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        switch (mb_strtolower($extension)) {
            case self::EXT_XLS:
            case self::EXT_XLSX:
                return new XlsxReader();
            case self::EXT_CSV:
                return new CsvReader();
            default:
                throw new InvalidArgumentException('Invalid data file provided.');
        }
    }
}