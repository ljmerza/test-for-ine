<?php

use PHPUnit\Framework\TestCase;

include_once('./Point.php');
include_once('./Circle.php');


class PointTest extends TestCase
{
    /**
     * Test that a point and circle intersecting returns true.
     *
     * @return void
     */
    public function testPointIntersectionTrue()
    {
        $point = new Point(2, 2);
        $circle_center_point = new Point(1, 1);
        $circle = new Circle($circle_center_point, 5);

        $does_intersect = $point->intersect($circle);
        $this->assertTrue($does_intersect);
    }

    /**
     * Test that a point and circle intersecting returns false.
     *
     * @return void
     */
    public function testPointIntersectionFalse()
    {
        $point = new Point(8, 8);
        $circle_center_point = new Point(1, 1);
        $circle = new Circle($circle_center_point, 2);

        $does_intersect = $point->intersect($circle);
        $this->assertFalse($does_intersect);
    }
}
