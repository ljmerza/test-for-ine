
/**
 * A point with a x,y coordinate
 */
export default class Point {
	
	constructor(x, y) {
        this.x = x;
        this.y = y;
    }

    /**
     * Is the point inside a given circle?
     * @return bool
     */
    intersect(circle) {
        const left_equation = pow(abs(this.x - circle.point.x), 2);
        const right_equation = pow(abs(this.y - circle.point.y), 2);
        
        return sqrt(left_equation + right_equation) > circle.radius;
    }
}