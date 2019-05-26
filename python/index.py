import argparse

from models.circle import ParseCircle
from models.line import ParseLine
from models.point import ParsePoint

# create arguments parser
parser = argparse.ArgumentParser(description='Find intersections.')

parser.add_argument('--line1', '-l', type=str, nargs='?', action=ParseLine,
                    help='The first line given as x1,y1,x2,y2')
parser.add_argument('--line2', '-m', type=str, nargs='?', action=ParseLine,
                    help='The second line given as x1,y1,x2,y2')
parser.add_argument('--circle1', '-c', type=str, nargs='?', action=ParseCircle,
                    help='The fist circle given as x,y,r')
parser.add_argument('--circle2', '-d', type=str, nargs='?', action=ParseCircle,
                    help='The second circle given as x,y,r')
parser.add_argument('--point', '-p', type=str, nargs='?', action=ParsePoint,
                    help='A point given as x,y')

args = parser.parse_args()

# check for intersections
if (args.line1 and args.line2):
    intersect =  "" if args.line1.intersect(args.line2) else "Not "
    print(f'The Two Lines Do {intersect}Intersect')

elif (args.circle1 and args.circle2):
    intersect = "" if args.circle1.intersect(args.circle2) else "Not "
    print(f'The Two Circles Do {intersect}Intersect')

elif (args.circle1 and args.point):
    intersect = "" if args.point.intersect(args.circle1) else "Not "
    print(f'The Point and Circle Do {intersect}Intersect')

else:
    print('Arugments must include two lines, two circles, or a point and circle.')