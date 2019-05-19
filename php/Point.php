<?php 

/**
 * A point with a x,y coordinate
 */
class Point
{
	public $x;
	public $y;
	
	function __construct($x, $y) 
	{
    $this->x = $x;
    $this->y = $y;
  }

  /**
	 * Is the point inside a given circle?
	 * 
	 * @return bool
	 */
	public function intersect($circle)
	{
		$left_equation = pow(abs($this->x - $circle->point->x), 2);
		$right_equation = pow(abs($this->y - $circle->point->y), 2);
		
	  return sqrt($left_equation + $right_equation) < $circle->radius;
  }
}

/**
 * check that a point argument is in the correct format
 * 
 * @param string $point
 * @return bool
 */
$checkPoint = function($point)
{
  $points = explode(",", $point);

  // make sure there are 2 points given
  if(count($points) != 2){
    return false;
  }

  // make sure all 2 points are ints
  $all_int_points = array_filter($points, "is_numeric");
  if(count($all_int_points) != 2){
    return false;
  }

  return true;
};

/**
 * create a circle from a circle argument
 * 
 * @param string $point
 * @return Point
 */
$createPoint = function($point) 
{
    list($x, $y) = explode(",", $point);
    return new Point($x, $y);
};

?>