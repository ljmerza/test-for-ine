<?php

use PHPUnit\Framework\TestCase;

include_once('./Point.php');
include_once('./Circle.php');


class CircleTest extends TestCase
{
    /**
     * Test that two circles intersecting returns true.
     *
     * @return void
     */
    public function testCircleIntersectionTrue()
    {
        $point1 = new Point(2, 3);
        $circle1 = new Circle($point1, 12);

        $point2 = new Point(15, 28);
        $circle2 = new Circle($point2, 10);

        $does_intersect = $circle1->intersect($circle2);
        $this->assertTrue($does_intersect);
    }

    /**
     * Test that two circles intersecting returns false.
     *
     * @return void
     */
    public function testCircleIntersectionFalse()
    {
        $point1 = new Point(1, 1);
        $circle1 = new Circle($point1, 1);

        $point2 = new Point(5, 5);
        $circle2 = new Circle($point2, 1);

        $does_intersect = $circle1->intersect($circle2);
        $this->assertFalse($does_intersect);
    }
}
