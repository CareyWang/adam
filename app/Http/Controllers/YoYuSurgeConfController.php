<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class YoYuSurgeConfController extends Controller
{
    const CONF_PATH = '/resources/files/YoYu.conf';
    const ADVANCED_CONF_PATH = '/resources/files/YoYu-Advance.conf';

    public function generate($url)
    {
        return response($this->transfer($url, self::CONF_PATH), 200)->withHeaders([
            'Content-Type' => 'text/html; charset=UTF-8',
            'Cache-Control' => 'public, max-age=604800',
        ]);
    }

    public function generateAdvanced($url)
    {
        return response($this->transfer($url, self::ADVANCED_CONF_PATH), 200)->withHeaders([
            'Content-Type' => 'text/html; charset=UTF-8',
            'Cache-Control' => 'public, max-age=604800',
        ]);
    }

    private function transfer($url, $confPath)
    {
        $eUrl = urlencode($url);

        $conf = File::get (base_path() . $confPath, $lock = false);
        $conf = mb_convert_encoding($conf, 'UTF-8');

        $conf = str_replace(':url', $url, $conf);
        $conf = str_replace(':eUrl', $eUrl, $conf);

        return $conf;
    }
}
