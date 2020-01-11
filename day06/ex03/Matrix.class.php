<?PHP

require_once("Vector.class.php");

class Matrix
{

const IDENTITY = "IDENTITY";
const SCALE = "SCALE";
const RX = "RX";
const RY = "RY";
const RZ = "RZ";
const TRANSLATION = "TRANSLATION";
const PROJECTION = "PROJECTION";

private $_vtcX;
private $_vtcY;
private $_vtcZ;
private $_vtxO;

static $verbose = false;

public function  getvtcX(){return $this->_vtcX;}
public function  getvtcY(){return $this->_vtcY;}
public function  getvtcZ(){return $this->_vtcZ;}
public function  getvtxO(){return $this->_vtxO;}

public function __construct(array $arg)
{
	$this->_vtcX = new Vector(array("dest" => new Vertex(array("x" => 1.0, "y" => 0.0, "z" => 0.0))));
	$this->_vtcY = new Vector(array("dest" => new Vertex(array("x" => 0.0, "y" => 1.0, "z" => 0.0))));
	$this->_vtcZ = new Vector(array("dest" => new Vertex(array("x" => 0.0, "y" => 0.0, "z" => 1.0))));
	$this->_vtxO = new Vertex(array("x" => 0.0, "y" => 0.0, "z" => 0.0));
	if ($arg["preset"] == TRANSLATION && isset($arg["vtc"]))
	{
		$this->_vtxO->setX($this->_vtxO->getX() + $arg["vtc"]->getX());
		$this->_vtxO->setY($this->_vtxO->getY() + $arg["vtc"]->getY());
		$this->_vtxO->setZ($this->_vtxO->getZ() + $arg["vtc"]->getZ());
	}
	if ($arg["preset"] == SCALE && isset($arg["scale"]))
	{
		$this->_vtcX = $this->getvtcX()->scalarProduct($arg["scale"]);
		$this->_vtcY = $this->getvtcY()->scalarProduct($arg["scale"]);
		$this->_vtcZ = $this->getvtcZ()->scalarProduct($arg["scale"]);
	}
	if ($arg["preset"] == RX && isset($arg["angle"]))
	{
		$this->_vtcY = new Vector(array("dest" => new Vertex(array("x" => 0.0, "y" => cos($arg["angle"]), "z" => sin($arg["angle"])))));
		$this->_vtcZ = new Vector(array("dest" => new Vertex(array("x" => 0.0, "y" => -sin($arg["angle"]), "z" => cos($arg["angle"])))));
	}
	if ($arg["preset"] == RY && isset($arg["angle"]))
	{
		$this->_vtcX = new Vector(array("dest" => new Vertex(array("x" => cos($arg["angle"]), "y" => 0.0, "z" => -sin($arg["angle"])))));
		$this->_vtcZ = new Vector(array("dest" => new Vertex(array("x" => sin($arg["angle"]), "y" => 0.0, "z" => cos($arg["angle"])))));
	}
	if ($arg["preset"] == RZ && isset($arg["angle"]))
	{
		$this->_vtcX = new Vector(array("dest" => new Vertex(array("x" => cos($arg["angle"]), "y" => sin($arg["angle"]), "z" => 0.0))));
		$this->_vtcY = new Vector(array("dest" => new Vertex(array("x" => -sin($arg["angle"]), "y" => cos($arg["angle"]), "z" => 0.0))));
	}
	if ($arg["preset"] == PROJECTION)
	{
		$this->_vtcX = new Vector(array("dest" => new Vertex(array("x" => 1.0 / ($arg["ratio"] * tan(deg2rad($arg["fov"] / 2))), "y" => 0.0, "z" => 0.0))));
		$this->_vtcY = new Vector(array("dest" => new Vertex(array("x" => 0.0, "y" => 1.0 / tan(deg2rad($arg["fov"] / 2)), "z" => 0.0))));
		$this->_vtcZ = new Vertex(array("x" => 0.0, "y" => 0.0, "z" => (-$arg["near"] - $arg["far"]) / ($arg["near"] - $arg["far"]), "w" => -1.0));
		$this->_vtxO = new Vertex(array("x" => 0.0, "y" => 0.0, "z" => (2 *$arg["far"] * $arg["near"]) / ($arg["near"] - $arg["far"]), "w" => 0.0));
	}
	if (self::$verbose)
		echo "Matrix " . $arg["preset"] . " instance destructed\n";
}

public function __toString()
{
	return sprintf("M | vtcX | vtcY | vtcZ | vtxO\n-----------------------------\nx | %.2f | %.2f | %.2f | %.2f\ny | %.2f | %.2f | %.2f | %.2f\nz | %.2f | %.2f | %.2f | %.2f\nw | %.2f | %.2f | %.2f | %.2f", $this->getvtcX()->getX(),
	$this->getvtcY()->getX(), $this->getvtcZ()->getX(), $this->getvtxO()->getX(), $this->getvtcX()->getY(),
	$this->getvtcY()->getY(), $this->getvtcZ()->getY(), $this->getvtxO()->getY(), $this->getvtcX()->getZ(),
	$this->getvtcY()->getZ(), $this->getvtcZ()->getZ(), $this->getvtxO()->getZ(), $this->getvtcX()->getW(),
	$this->getvtcY()->getW(), $this->getvtcZ()->getW(), $this->getvtxO()->getW());
}

public function __destruct()
{
	if (self::$verbose)
		echo "Matrix instance destructed\n";
}

static function doc()
{
	echo file_get_contents("Matrix.doc.txt");
}

public function mult(Matrix $m)
{
	;
}

}
?>
