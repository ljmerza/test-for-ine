<?php 

/**
 * A circle with a radius and center point
 */
class Circle 
{
	public $point;
	public $radius;

	function __construct($point, $radius) 
	{
    $this->point = $point;
    $this->radius = $radius;
  }

	/**
	 * Does a circle intersect another circle?
	 * (Does not include if circle is within circle)
	 * 
	 * @return bool
	 */
	public function intersect($circle)
	{
		$x = pow(($this->point->x - $circle->point->x), 2);
		$y = pow(($this->point->y - $circle->point->y), 2);
		$d = sqrt($x + $y);

		if($d < pow(($this->radius + $circle->radius), 2))
			return true;

		return false;
  }
}

/**
 * check that a circle argument is in the correct format
 * 
 * @param string $circle
 * @return bool
 */
$checkCircle = function($circle)
{
  $points = explode(",", $circle);

  // make sure there are 3 points given
  if(count($points) != 3){
    return false;
  }

  // make sure all 3 points are ints
  $all_int_points = array_filter($points, "is_numeric");
  if(count($all_int_points) != 4){
    return false;
  }

  return true;
};

/**
 * create a circle from a circle argument
 * 
 * @param string $circle
 * @return Circle
 */
$createCircle = function($circle) 
{
    list($x, $y, $radius) = explode(",", $circle);
    $point = new Point($x, $y);
    return new Circle($point, $radius);
};

?>