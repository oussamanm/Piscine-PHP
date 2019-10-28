<?php
    class Color
    {
        public $red;
        public $green;
        public $blue;
        static $verbose = FALSE;

        function __construct(array $parr_rgb)
        {
            if (array_key_exists('rgb', $parr_rgb))
            {
                $rgb_value = (int )$parr_rgb['rgb'];
                $this->red = (int )($rgb_value >> 16) & 255;
                $this->green = (int )($rgb_value >> 8) & 255;
                $this->blue = (int )($rgb_value & 255);
            }
            else if (array_key_exists('red', $parr_rgb) && array_key_exists('green', $parr_rgb) && array_key_exists('blue', $parr_rgb))
            {
                $this->red = (int )$parr_rgb['red'];
                $this->green = (int )$parr_rgb['green'];
                $this->blue = (int )$parr_rgb['blue'];
            }
            if (Color::$verbose === TRUE)
                print($this . " constructed." . PHP_EOL);
        }

        function __destruct()
        {
            if (self::$verbose === TRUE)
                print($this . " destructed." . PHP_EOL);
        }
        function __tostring()
        {
            return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
        }

        function add(Color $rhs)
        {
            $new_color = new Color([
                'red' => $rhs->red + $this->red,
                'green' => $rhs->green + $this->green,
                'blue' => $rhs->blue + $this->blue
            ]);
            return ($new_color);
        }
        function sub(Color $rhs)
        {
            $new_color = new Color([
                'red' => $this->red - $rhs->red,
                'green' => $this->green - $rhs->green,
                'blue' =>  $this->blue - $rhs->blue
            ]);
            return ($new_color);
        }
        function mult($f)
        {
            $new_color = new Color([
                'red' => $this->red * $f,
                'green' => $this->green * $f,
                'blue' =>  $this->blue * $f
            ]);
            return ($new_color);
        }
        static function doc()
        {
            $content = "";
            if (file_exists("./Color.doc.txt"))
                $content = file_get_contents("./Color.doc.txt");
            return $content;
        }
    }
?>