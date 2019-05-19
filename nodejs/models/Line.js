
/**
 * A line with a start and end Point
 */
export default class Line {

    constructor(p1, p2) {
        this.p1 = p1;
        this.p2 = p2;
    }

    /**
     * do two lines intersect?
     * @return bool
     */
    intersect(line) {
        const a1 = line.p2.y - line.p1.y;
        const b1 = line.p1.x - line.p2.x;

        const a2 = this.p2.y - this.p1.y;
        const b2 = this.p1.x - this.p2.x;

        const determinant = a1 * b2 - a2 * b1;
        return determinant == 0;
    }
}