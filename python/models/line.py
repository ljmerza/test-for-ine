import argparse

from models.point import Point


class Line():
    """A line with a start and end Point object."""

    def __init__(self, p1, p2):
        self.p1 = p1
        self.p2 = p2

    def intersect(self, line):
        """Do two lines intersect?"""
        p1 = line.p1
        q1 = line.p2
        p2 = self.p2
        q2 = self.p2

        left = max(min(p1.x, q1.x), min(p2.x, q2.x))
        right = min(max(p1.x, q1.x), max(p2.x, q2.x))
        top = max(min(p1.y, q1.y), min(p2.y, q2.y))
        bottom = min(max(p1.y, q1.y), max(p2.y, q2.y))

        if (top > bottom or left > right):
            return False

        return True


class ParseLine(argparse.Action):
    """Parse a line argument."""
    def __call__(self, parser, args, values, option_string=None):
        try:
            [x1, y1, x2, y2] = map(int, values.split(','))
        except ValueError:
            print('All values for a line must be a number.')
            return
        point1 = Point(x1, y1)
        point2 = Point(x2, y2)
        line = Line(point1, point2)
        setattr(args, self.dest, line)