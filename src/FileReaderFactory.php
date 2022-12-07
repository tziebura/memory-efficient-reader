<?php

namespace App;

use App\Reader\FileReader;

interface FileReaderFactory
{
    const EXT_XLSX = 'xlsx';
    const EXT_XLS  = 'xls';
    const EXT_CSV  = 'csv';

    public function getFileReader(string $filePath): FileReader;
}