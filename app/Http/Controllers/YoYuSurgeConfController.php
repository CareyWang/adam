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
        $conf = mb_convert_encoding($conf, 'UTF-8');

        $conf = str_replace(':url', $url, $conf);
        $conf = str_replace(':eUrl', $eUrl, $conf);

        return response($conf, 200)->header('Content-Type', 'text/html; charset=UTF-8');
    }
}
