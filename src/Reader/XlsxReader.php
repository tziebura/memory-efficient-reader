<?php

namespace App\Reader;

use Generator;
use OpenSpout\Reader\Common\Creator\ReaderEntityFactory;

final class XlsxReader implements FileReader
{
    function read(string $filePath): Generator
    {
        $reader = ReaderEntityFactory::createXLSXReader();
        $reader->open($filePath);

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                yield $row;
            }

            break;
        }
    }
}