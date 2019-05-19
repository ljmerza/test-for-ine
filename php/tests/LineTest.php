<?php

use PHPUnit\Framework\TestCase;

include_once('./Point.php');
include_once('./Line.php');


class LineTest extends TestCase
{
    /**
     * Test that two lines intersecting returns true.
     *
     * @return void
     */
    public function testLineIntersectionTrue()
    {
        $point1 = new Point(0, 0);
        $point2 = new Point(4, 4);
        $line1 = new Line($point1, $point2);

        $point3 = new Point(4, 0);
        $point4 = new Point(0, 4);
        $line2 = new Line($point3, $point4);

        $does_intersect = $line1->intersect($line2);
        $this->assertTrue($does_intersect);
    }

    /**
     * Test that two lines intersecting returns false.
     *
     * @return void
     */
    public function testLineIntersectionFalse()
    {
        $point1 = new Point(0, 0);
        $point2 = new Point(4, 4);
        $line1 = new Line($point1, $point2);

        $point3 = new Point(2, 2);
        $point4 = new Point(3, 3);
        $line2 = new Line($point3, $point4);

        $does_intersect = $line1->intersect($line2);
        $this->assertFalse($does_intersect);
    }
}
