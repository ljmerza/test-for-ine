<?php 

/**
 * A line with a start and end Point
 */
class Line 
{
	public $p1;
	public $p2;

  function __construct($p1, $p2) 
  {
    $this->p1 = $p1;
    $this->p2 = $p2;
  }

  /**
	 * do two lines intersect?
   * 
   * @param string $line the line to see if it intersects
	 * @return bool
	 */
  public function intersect($line)
  { 
    $p1 = $line->p1;
    $q1 = $line->p2;
    $p2 = $this->p2;
    $q2 = $this->p2;

    $left = max(min($p1->x, $q1->x), min($p2->x, $q2 ->x));
    $right = min(max($p1->x, $q1->x), max($p2->x, $q2 ->x));
    $top = max(min($p1->y, $q1->y), min($p2->y, $q2 ->y));
    $bottom = min(max($p1->y, $q1->y), max($p2->y, $q2->y));

    if ($top > $bottom or $left > $right)
      return false;

    return true;
  }
}

/**
 * check that a line argument is in the correct format
 * 
 * @param string $line the line argument to parse
 * @return bool
 */
$checkLine = function($line)
{
  $points = explode(",", $line);

  // make sure there are 4 points given
  if(count($points) != 4){
    return false;
  }

  // make sure all 4 points are ints
  $all_int_points = array_filter($points, "is_numeric");
  if(count($all_int_points) != 4){
    return false;
  }

  return true;
};

/**
 * create a line from a line argument
 * 
 * @param string $line the line argument to parse
 * @return Line
 */
$createLine = function($line) 
{
    list($x1, $y1, $x2, $y2) = explode(",", $line);
    $point1 = new Point($x1, $y1);
    $point2 = new Point($x2, $y2);
    return new Line($point1, $point2);
};

?>