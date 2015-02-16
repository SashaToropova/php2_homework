<?php
class Color {
   public $red;
   public $green;
   public $blue;

   public function __construct($r,$g,$b){
      $this->red = $r;
      $this->green = $g;
      $this->blue = $b;

      $this->color = $this->red .",". $this->green .",". $this->blue;
   }
   public function __toString()
    {
        return $this->color;
    }
}

abstract class Component
{
    protected $color;
    protected $width;
    protected $height;

    abstract public function render();
}

class Rectangle extends Component {
   public function __construct($color,$width,$height){
      $this->color = $color;
      $this->width = $width;
      $this->height = $height;
   }

   public function render()
    {
      echo "<pre><div style=\"background-color:rgb($this->color);width:$this->width;height:$this->height\"></pre></div>";
    }
}


class BorderedRectangle extends Rectangle
{
    function __construct($color,$width,$height,$borderColor)
   {
      parent::__construct($color,$width,$height);
      $this->borderColor = $borderColor;
   }
 public $borderColor;

     function render()
    {
        echo "<pre><div style=\"background-color:rgb($this->color);width:$this->width;height:$this->height; border:20px solid $this->borderColor;\"></pre></div>";
    }
}

class PositionedRectangle extends Rectangle
{
    function __construct($color,$width,$height,$coordX,$coordY)
    {
	parent::__construct($color,$width,$height);
	$this->coordX = $coordX;
	$this->coordY = $coordY;
    }
    public $coordX;
    public $coordY;
    function render()
    {
	echo "<pre><div style=\"background-color:rgb($this->color);width:$this->width;height:$this->height;position:absolute;left:$this->coordX;Top:$this->coordY\"></pre></div>";
    }
}

class Render
{
    function __construct($array)
    {
	for ($i=0; $i < sizeof($array); $i++)
	    $this->array[$i] = $array[$i];
    }
    public $array;
    function Rrender()
    {
	for($i=0;$i<sizeof($this->array);$i++)
	{
	    $this->array[$i]->render();
	    echo "\n";
	}
    }
}
    
$color = new Color(127,0,0);
$rect = new Rectangle($color, 100, 50);
//$rect->render();
echo "\n";
$borderRect = new BorderedRectangle($color,300,250,'black');
//$borderRect->render();
echo "\n";
$posrect = new PositionedRectangle($color, 300, 300, 500,500);
//$posrect->render();

$narr = array($rect,$borderRect,$posrect);
$ren = new Render($narr);
$ren->Rrender();