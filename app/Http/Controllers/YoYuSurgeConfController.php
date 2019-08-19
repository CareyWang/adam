<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class YoYuSurgeConfController extends Controller
{
    public function transfer($url)
    {
        $eUrl = urlencode($url);

        $conf = File::get (base_path() . '/resources/files/YoYu.conf', $lock = false);
        $conf = str_replace(':url', $url, $conf);
        $conf = str_replace(':eUrl', $eUrl, $conf);
        dump($conf);
        return $conf;
    }
}
