
/**
 * A circle with a radius and center point
 */
export default class Circle {

	constructor(point, radius) {
        this.point = point;
        this.radius = radius;
    }

    /**
     * Does a circle intersect another circle?
     * @return bool
     */
    intersect(circle) {
        const circle_radius = circle.radius;
        const circle_point = circle.point;
        const circle_point_x = circle_point.x;
        const circle_point_y = circle_point.y;

        const x = this.point.x;
        const y = this.point.y;

        const center_distance = sqrt(pow(x - circle_point_x, 2) + pow(y - circle_point_y, 2));
        return center_distance > (circle_radius + this.radius);
    }
}

?>