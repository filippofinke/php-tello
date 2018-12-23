<?php
namespace Classes;

class StatusParser
{
    public static function parse($string)
    {
        $result = array();
        foreach (explode(";", $string) as $segment) {
            if ($segment == null || trim($segment) == "") {
                continue;
            }
            $data = explode(":", $segment);
            $key = $data[0];
            $value = $data[1];
            $result[$key] = $value;
        }
        return $result;
    }
}
