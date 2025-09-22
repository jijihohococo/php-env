<?php

namespace JiJiHoHoCoCo\PHPENV;

class ENV
{
    private static $env , $comma ;
    private static $dataset = [];

    public static function set(string $filePath)
    {
        if (is_readable($filePath)) {
            self::$comma = rand();
            self::$env = implode(self::$comma, file($filePath));
        } else {
            throw new Exception($filePath . ' is not exist', 1);
        }
    }

    public static function get()
    {
        return self::$env;
    }

    public static function getComma()
    {
        return self::$comma;
    }

    public static function setDataset(string $key, $data)
    {
        self::$dataset[$key] = $data;
    }

    public static function getDataset()
    {
        return self::$dataset;
    }
}
