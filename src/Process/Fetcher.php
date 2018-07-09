<?php

namespace Codervio\Filesignature\Process;

use Exception;

class Fetcher
{
    public function getResult($fgetslines, $k)
    {
        $signature = explode('   ', $fgetslines[$k]);

        return [
            'name' => $fgetslines[$k - 2],
            //'sigFile' => $fileSignatureData,
            'signature' => strtolower($signature[1]),
            'ext' => $fgetslines[$k + 1],
            'mime' => $fgetslines[$k + 2]
        ];
    }

    public function getSignature($fgetslines, $k)
    {
        $signature = explode('   ', $fgetslines[$k]);

        return [
            'signature' => strtolower($signature[1])
        ];
    }
}