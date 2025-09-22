<?php

use JiJiHoHoCoCo\PHPENV\ENV;

if (!function_exists('getStringBetween')) {
    function getStringBetween(string $str, string $from, string $to): string
    {

        $string = substr($str, strpos($str, $from) + strlen($from));

        if (strstr($string, $to, true) != false) {
            $string = strstr($string, $to, true);
        }

        return $string;
    }
}

if (!function_exists('gete')) {
    function gete(string $data)
    {
        $previousData = $data;
        $dataset = ENV::getDataset();
        if (isset($dataset[$data])) {
            return  preg_replace('/\s+/', '', $dataset[$data]);
        } else {
            $data = $data . '=';
            $env = ENV::get();
            $comma = ENV::getComma();
            if ($env == null) {
                throw new \Exception("Please set the file path firstly", 1);
            }
            $getData = strpos($env, $data) !== false ? getStringBetween($env, $data, $comma) : null;
            ENV::setDataset($previousData, $getData);
            return  preg_replace('/\s+/', '', $getData);
        }
    }
}
