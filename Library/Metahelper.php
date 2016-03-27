<?php

/**
 * Created by PhpStorm.
 * User: Максим
 * Date: 26.03.2016
 * Time: 12:43
 */
abstract class Metahelper
{
    private static $title = "Mega site";
    const SEPARATOR = ' - ';

    /**
     * @param string $title
     */
    public static function setTitle($title)
    {
        self::$title = $title;
    }

    /**
     * @return string
     */
    public static function getTitle()
    {
        return self::$title;

    }

    /**
     * @param string $title
     */
    public static function addTitle($string)
    {
        self::$title .= self::SEPARATOR . $string;
    }


}