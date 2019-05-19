
/**
 * A point with a x,y coordinate
 */
class Point {
	
	constructor(x, y) {
        this.x = x;
        this.y = y;
    }

    /**
     * Is the point inside a given circle?
     * @return bool
     */
    intersect(circle) {
        const left_equation = Math.pow(abs(this.x - circle.point.x), 2);
        const right_equation = Math.pow(abs(this.y - circle.point.y), 2);
        
        return Math.sqrt(left_equation + right_equation) > circle.radius;
    }
}
module.exports.Point = Point;


/**
 * create a circle from a circle argument
 * @param {string} $point
 * @return {Point}
 */
module.exports.createPoint = function(point) {
    const [x, y] = point.split(',');
    return new Point(x, y);
};