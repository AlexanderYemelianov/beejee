<?php

class Config{

    protected static $settings = array();

    public static function getSettings($key)
    {
        return isset(self::$settings[$key]) ? self::$settings[$key] : null;
    }

    public static function setSettings($key, $value)
    {
        self::$settings[$key] = $value;
    }

}