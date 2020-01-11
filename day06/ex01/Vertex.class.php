<?php



class Vertex
{
    private $_color;
    private $_x = 0;
    private $_y = 0;
    private $_z = 0;
    private $_w = 1.0;
    public static $verbose = false;

    public function __get ($att)
    {
        print ("Attempt to access \'" . $att . "'\ attribute, this script should die." . PHP_EOL);
        return 'dasd';
    }

    public function __set ($att, $value)
    {
        print ("Attempt to set \'" . $att . "'\ attribute to \'" . $value . "\', this script should die." . PHP_EOL);
        return ;
    }

    public function setX($param)
    {
        $this->_x = $param;
    }

    public function setY($param)
    {
        $this->_y = $param;
    }

    public function setZ($param)
    {
        $this->_z = $param;
    }

    public function setW($param)
    {
        $this->_w = $param;
    }

    public function setColor($param)
    {
        $this->_color = $param;
    }

    public function getX()
    {
        return $this->_x;
    }

    public function getY()
    {
        return $this->_y;
    }

    public function getZ()
    {
        return $this->_z;
    }

    public function getW()
    {
        return $this->_w;
    }

    public function getColor()
    {
        return $this->_color;
    }

    public static function doc()
    {
        return ("ALLO" . PHP_EOL);
    }
    
    public function __toString()
    {
        return (sprintf("Vertex ( x: %4.2f, y: %4.2f, z:%.2f, w:%.2f %s",
            $this->getX(), $this->getY(), $this->getZ(), $this->getW(), 
            self::$verbose == true ? ", " . $this->getColor() . " )" : ')'));
    }   
    
    public function __construct (array $vert)
    {
        if (!isset($vert['x']) && !isset($vert['y']) && !isset($vert['z']))
            die ("XY Z OBLIGATOIRE");
        if (isset($vert['color']) && $vert['color'] instanceof Color)
            $this->_color =  $vert['color'];
        else
            $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
        if (isset($vert['x']))
            $this->_x = $vert['x'];
        if (isset($vert['y']))
            $this->_y = $vert['y'];
        if (isset($vert['z']))
            $this->_z = $vert['z'];
        if (isset($vert['w']))
            $this->_w = $vert['w'];
        if (self::$verbose == true)
            echo "$this constructed\n";
        return ;
    }

    public function __destruct ()
    {
        if (self::$verbose == true)
            echo "$this destructed\n";
        return ;
    }
}

?>

