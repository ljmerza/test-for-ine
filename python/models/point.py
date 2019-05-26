import argparse
import math


class Point():
    """A point with a x,y coordinate"""
	
    def __init__(self, x, y):
        self.x = x
        self.y = y

    def intersect(self, circle):
        """Is the point inside a given circle?"""
        left_equation = (abs(self.x - circle.point.x)) ** 2
        right_equation = (abs(self.y - circle.point.y)) ** 2
        
        return math.sqrt(left_equation + right_equation) > circle.radius


class ParsePoint(argparse.Action):
    """Parse a point argument."""
    def __call__(self, parser, args, values, option_string=None):
        try:
            [x, y] = map(int, values.split(','))
        except ValueError as e:
            print('All values for a point must be a number.')
            return
        point = Point(x, y)
        setattr(args, self.dest, point)