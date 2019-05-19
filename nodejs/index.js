const commander = require('commander');

const creatCircle = require('./models/Circle').creatCircle;
const createPoint = require('./models/Point').createPoint;
const createLine = require('./models/Line').createLine;


const program = new commander.Command();

program 
    .option('-l, --line1 <type>', 'The first line given as x1,y1,x2,y2')
    .option('-m, --line2 <type>', 'The second line given as x1,y1,x2,y2')
    .option('-c, --circle1 <type>', 'The fist circle given as x,y,r')
    .option('-d, --circle2 <type>', 'The second circle given as x,y,r')
    .option('-p, --point <type>', 'A point given as x,y');

program.parse(process.argv);


// check  for two lines
const line1 = program.line1 && createLine(program.line1);
const line2 = program.line2 && createLine(program.line2);

if (line1 && line2) {
    const intersect = line1.intersect(line2) ? "" : "Not ";
    console.log(`The Two Lines Do ${intersect}Intersect`);
}

// check for two circles
const circle1 = program.circle1 && creatCircle(program.circle1);
const circle2 = program.circle2 && creatCircle(program.circle2);

if (circle1 && circle2) {
    const intersect = circle1.intersect(circle2) ? "" : "Not ";
    console.log(`The Two Circles Do ${intersect} Intersect`);
}

// check for a point and circle
const circle = program.circle1 && creatCircle(program.circle1) || program.circle2 && creatCircle(program.circle2);
const point = program.point && createPoint(program.point);

if (circle && point) {
    const intersect = point.intersect(circle) ? "" : "Not ";
    console.log(`The Point and Circle Do ${intersect}Intersect`);
}