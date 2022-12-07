<?php

namespace App\Reader;

use Generator;

interface FileReader
{
    function read(string $filePath): Generator;
}