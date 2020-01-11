<?PHP


class Vector
{
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	static $verbose = false;

    public function __construct(array $arg)
	{
		if (!isset($arg["orig"]))
			$orig = new Vertex(array("x" => 0.0, "y" => 0.0, "z" => 0.0));
		else
			$orig = $arg["orig"];
		$this->_x = $arg["dest"]->getX() - $orig->getX();
		$this->_y = $arg["dest"]->getY() - $orig->getY();
		$this->_z = $arg["dest"]->getZ() - $orig->getZ();
		$this->_w = 0.0;
		if (self::$verbose)
			echo "$this constructed\n";
	}
    
    public function __destruct()
	{
		if (self::$verbose)
			echo "$this destructed\n";
    }
    
	static function doc()
	{
		echo "doc\n";
    }
    
	public function __toString()
	{
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->getX(), $this->getY(), $this->getZ(), $this->getW());
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
    
	public function magnitude()
	{
		return sqrt(pow($this->getX(), 2) + pow($this->getY(), 2) + pow($this->getZ(), 2));
    }
    
	public function normalize()
	{
		$norm = $this->magnitude();
		return new Vector(array("dest" => new Vertex(array("x" => $this->getX() / $norm,
		"y" => $this->getY() / $norm, "z" => $this->getZ() / $norm))));
    }
    
	public function add(Vector $rhs)
	{
		return new Vector(array("dest" => new Vertex(array("x" => $this->getX() + $rhs->getX(),
		"y" => $this->getY() + $rhs->getY(), "z" => $this->getZ() + $rhs->getZ()))));
    }
    
	public function sub(Vector $rhs)
	{
		return new Vector(array("dest" => new Vertex(array("x" => $this->getX() - $rhs->getX(),
		"y" => $this->getY() - $rhs->getY(), "z" => $this->getZ() - $rhs->getZ()))));
    }
    
    public function opposite()
	{
		return new Vector(array("dest" => new Vertex(array("x" => -$this->getX(),
		"y" => -$this->getY(), "z" => -$this->getZ()))));;
	}
    
    public function scalarProduct($k)
	{
		return new Vector(array("dest" => new Vertex(array("x" => $this->getX() * $k,
		"y" => $this->getY() * $k, "z" => $this->getZ() * $k))));;;
    }
    
	public function dotProduct(Vector $rhs)
	{
		return floatval($this->getX() * $rhs->getX() + $this->getY() * $rhs->getY() + $this->getZ() * $rhs->getZ());
    }
    
	public function cos(Vector $rhs)
	{
		return floatval($this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude()));
    }
    
	public function crossProduct(Vector $rhs)
	{
		return new Vector(array("dest" => new Vertex(array("x" => ($this->getY() * $rhs->getZ()) - ($this->getZ() * $rhs->getY()),
		"y" => ($this->getZ() * $rhs->getX()) - ($this->getX() * $rhs->getZ()), "z" => ($this->getX() * $rhs->getY()) - ($this->getY() * $rhs->getX())))));
	}
}
​
?>