<?php
namespace Classes;

class Commands
{
    public static function command()
    {
        return new Command(self::getMethodName(), 500);
    }

    public static function takeoff()
    {
        return new Command(self::getMethodName(), 500);
    }

    public static function land()
    {
        return new Command(self::getMethodName(), 500);
    }

    public static function streamon()
    {
        return new Command(self::getMethodName(), 500);
    }

    public static function streamoff()
    {
        return new Command(self::getMethodName(), 500);
    }

    public static function emergency()
    {
        return new Command(self::getMethodName(), 500);
    }

    public static function up($cm)
    {
        $cm = self::sanitizeCm($cm);
        return new Command(self::getMethodName()." ".$cm, 500);
    }

    public static function down($cm)
    {
        $cm = self::sanitizeCm($cm);
        return new Command(self::getMethodName()." ".$cm, 500);
    }

    public static function left($cm)
    {
        $cm = self::sanitizeCm($cm);
        return new Command(self::getMethodName()." ".$cm, 500);
    }

    public static function right($cm)
    {
        $cm = self::sanitizeCm($cm);
        return new Command(self::getMethodName()." ".$cm, 500);
    }

    public static function forward($cm)
    {
        $cm = self::sanitizeCm($cm);
        return new Command(self::getMethodName()." ".$cm, 500);
    }

    public static function back($cm)
    {
        $cm = self::sanitizeCm($cm);
        return new Command(self::getMethodName()." ".$cm, 500);
    }

    public static function cw($degree)
    {
        $degree = self::sanitizeDegree($degree);
        return new Command(self::getMethodName()." ".$degree, 500);
    }

    public static function ccw($degree)
    {
        $degree = self::sanitizeDegree($degree);
        return new Command(self::getMethodName()." ".$degree, 500);
    }

    public static function flip($x)
    {
        $directions = array("l", "r", "f", "b");
        if (!in_array($x, $directions)) {
            return null;
        }
        return new Command(self::getMethodName()." ".$x, 500);
    }

    public static function go($x, $y, $z, $speed)
    {
        $x = self::sanitizeCm($x);
        $y = self::sanitizeCm($y);
        $z = self::sanitizeCm($z);
        $speed = self::sanitizeSpeed($speed);
        return new Command(self::getMethodName()." ".$x." ".$y." ".$z." ".$speed, 500);
    }

    public static function curve($x1, $y1, $z1, $x2, $y2, $z2, $speed)
    {
        $x1 = self::sanitizeCm($x1);
        $y1 = self::sanitizeCm($y1);
        $z1 = self::sanitizeCm($z1);
        $x2 = self::sanitizeCm($x2);
        $y2 = self::sanitizeCm($y2);
        $z2 = self::sanitizeCm($z2);
        $speed = self::sanitizeCurveSpeed($speed);
        return new Command(self::getMethodName()." ".$x1." ".$y1." ".$z1." ".$x2." ".$y2." ".$z2." ".$speed, 500);
    }

    public static function speed($speed)
    {
        $speed = self::sanitizeSpeed($speed);
        return new Command(self::getMethodName()." ".$speed, 500);
    }

    public function rc($a, $b, $c, $d)
    {
        $a = self::sanitizeRc($a);
        $b = self::sanitizeRc($b);
        $c = self::sanitizeRc($c);
        $d = self::sanitizeRc($d);
        return new Command(self::getMethodName()." ".$a." ".$b." ".$c." ".$d, 500);
    }

    public function wifi($ssid, $password)
    {
        return new Command(self::getMethodName()." ".$ssid." ".$password, 500);
    }

    public static function getSpeed()
    {
        return new Command("speed?", 500);
    }

    public static function getBattery()
    {
        return new Command("battery?", 500);
    }

    public static function getHeight()
    {
        return new Command("height?", 500);
    }

    public static function getTemp()
    {
        return new Command("temp?", 500);
    }

    public static function getAttitude()
    {
        return new Command("attitude?", 500);
    }

    public static function getBaro()
    {
        return new Command("baro?", 500);
    }

    public static function getAcceleration()
    {
        return new Command("acceleration?", 500);
    }

    public static function getTof()
    {
        return new Command("tof?", 500);
    }

    public static function getWifi()
    {
        return new Command("wifi?", 500);
    }

    private static function sanitizeRc($x)
    {
        if ($x < -100) {
            $x = -100;
        }
        if ($x > 100) {
            $x = 100;
        }
        return $x;
    }

    private static function sanitizeCurveSpeed($speed)
    {
        if ($speed < 10) {
            $speed = 10;
        }
        if ($speed > 60) {
            $speed = 60;
        }
        return $speed;
    }

    private static function sanitizeSpeed($speed)
    {
        if ($speed < 10) {
            $speed = 10;
        }
        if ($speed > 100) {
            $speed = 100;
        }
        return $speed;
    }

    private static function sanitizeDegree($degree)
    {
        if ($degree < 1) {
            $degree = 1;
        }
        if ($degree > 3600) {
            $degree = 3600;
        }
        return $degree;
    }

    private static function sanitizeCm($cm)
    {
        if ($cm < 20) {
            $cm = 20;
        }
        if ($cm > 500) {
            $cm = 500;
        }
        return $cm;
    }

    private static function getMethodName()
    {
        return debug_backtrace()[1]["function"];
    }
}
