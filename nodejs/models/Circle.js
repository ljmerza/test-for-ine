const Point = require('./Point').Point;


/**
 * A circle with a radius and center point
 */
class Circle {

	constructor(point, radius) {
        this.point = point;
        this.radius = radius;
    }

    /**
     * Does a circle intersect another circle?
     * @param {Circle} circle
     * @return {boolean}
     */
    intersect(circle) {
        const x = Math.pow((this.point.x - circle.point.x), 2);
        const y = Math.pow((this.point.y - circle.point.y), 2);
        const diameter = Math.sqrt(x + y);

        if (diameter < Math.pow((this.radius + circle.radius), 2))
            return true;

        return false;
    }
}
module.exports.Circle = Circle;


/**
 * create a circle from a circle argument
 * @param {string} circle
 * @return {Circle}
 */
module.exports.createCircle = function(circle) {
    const [x, y, radius] = circle.split(',');
    const point = new Point(x, y);
    return new Circle(point, radius);
};