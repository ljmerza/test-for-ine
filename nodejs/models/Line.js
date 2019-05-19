const Point = require('./Point').Point;


/**
 * A line with a start and end Point
 */
class Line {

    constructor(p1, p2) {
        this.p1 = p1;
        this.p2 = p2;
    }

    /**
     * do two lines intersect?
     * @param {Line} line
     * @return {boolean}
     */
    intersect(line) {
        const p1 = line.p1;
        const q1 = line.p2;
        const p2 = this.p2;
        const q2 = this.p2;

        const left = Math.max(Math.min(p1.x, q1.x), Math.min(p2.x, q2.x));
        const right = Math.min(Math.max(p1.x, q1.x), Math.max(p2.x, q2.x));
        const top = Math.max(Math.min(p1.y, q1.y), Math.min(p2.y, q2.y));
        const bottom = Math.min(Math.max(p1.y, q1.y), Math.max(p2.y, q2.y));

        if (top > bottom || left > right)
            return false;

        return true;
    }
}
module.exports.Line = Line;


/**
 * create a line from a line argument
 * @param {string} line
 * @return {Line}
 */
module.exports.createLine = function(line) {
    const [x1, y1, x2, y2] = line.split(',');
    const point1 = new Point(x1, y1);
    const point2 = new Point(x2, y2);
    return new Line(point1, point2);
};