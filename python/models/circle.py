import argparse
import math

from models.point import Point


class Circle():
    """A circle with a radius and center point."""

    def __init__(self, point, radius):
        self.point = point
        self.radius = radius

    def intersect(self, circle):
        """Does a circle intersect another circle?"""
        x = (self.point.x - circle.point.x) ** 2
        y = (self.point.y - circle.point.y) ** 2
        diameter = math.sqrt(x + y)

        if (diameter < (self.radius + circle.radius) ** 2):
            return True

        return False


class ParseCircle(argparse.Action):
    """Parse a circle argument."""
    def __call__(self, parser, args, values, option_string=None):
        try:
            [x, y, radius] = map(int, values.split(','))
        except ValueError:
            print('All values for a circle must be a number.')
            return
        point = Point(x, y)
        circle = Circle(point, radius)
        setattr(args, self.dest, circle)