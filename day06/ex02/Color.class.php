<?php

class Color
{
    public $red = 0;
    public $green = 0;
    public $blue = 0;
    public static $verbose = false;

    public static function doc()
    {
        return (file_get_contents("Color.doc.txt"));
    }

    public function __toString()
    {
        return ("Color( red: " . str_pad(strval($this->red), 3, " ", STR_PAD_LEFT) . 
        ", green: " . str_pad(strval($this->green), 3, " ", STR_PAD_LEFT) . 
        ", blue: " . str_pad(strval($this->blue), 3, " ", STR_PAD_LEFT). " )");
    }

    function add($color)
    {
        if ($color instanceof Color)
        {
            return (new Color ([
                'red' => $this->red + $color->red,
                'green' => $this->green + $color->green,
                'blue' => $this->blue + $color->blue
                ]));
        }
    }

    function sub($color)
    {
        if ($color instanceof Color)
            return (new Color ([
                'red' => $this->red - $color->red,
                'green' => $this->green - $color->green,
                'blue' => $this->blue - $color->blue
                ]));
    }

    function mult($color)
    {
            return (new Color ([
                'red' => intval($this->red * $color),
                'green' => intval($this->green * $color),
                'blue' => intval($this->blue * $color)
                ]));
    }

    public function __construct(array $color)
    {
        if (isset($color['red']) && isset($color['green']) && isset($color['blue']))
        {
            $this->red = intval($color['red']);
            $this->green = intval($color['green']);
            $this->blue = intval($color['blue']);
        }
        else if (isset($color['rgb']))
        {
            $this->red = intval($color['rgb']) >> 16 & 255;
            $this->green = intval($color['rgb']) >> 8 & 255;
            $this->blue = intval($color['rgb']) & 255;
        }
        else
        {
            echo "Please give and 'rgb' or 'red, green, blue' array\n";
            return ;
        }
        if (self::$verbose == true)
        {
            printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n",
                $this->red, $this->green, $this->blue);
        }
        return ;
    }   
    
    public function __destruct()
    {
        if (self::$verbose == true)
        {
            printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n",
                $this->red, $this->green, $this->blue);
        }
        return ;
    }
}

?>