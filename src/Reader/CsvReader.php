<?php

namespace App\Reader;

use SplFileObject;
use Generator;

final class CsvReader implements FileReader
{
    public function read(string $filePath): Generator
    {
        $file = new SplFileObject($filePath);

        while ($line = $file->fgetcsv()) {
            if (empty($line[0])) {
                continue;
            }

            yield $line;
        }

//        $this->filesystem->delete($filePath);
    }
}