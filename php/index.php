<?php

require('vendor/autoload.php');

use Commando\Command;

require 'Line.php';
require 'Point.php';
require 'Circle.php';


$cmd = new Command();
$cmd
  ->option('l')
    ->aka('line1')
    ->describedAs('The first line given as x1,y1,x2,y2')
    ->must($checkLine)
    ->map($createLine)
  ->option('m')
    ->aka('line2')
    ->describedAs('The second line given as x1,y1,x2,y2')
    ->must($checkLine)
    ->map($createLine)
  ->option('c')
    ->aka('circle1')
    ->describedAs('The fist circle given as x,y,r')
    ->must($checkCircle)
    ->map($createCircle)
  ->option('d')
    ->aka('circle2')
    ->describedAs('The second circle given as x,y,r')
    ->must($checkCircle)
    ->map($createCircle)
  ->option('p')
    ->aka('point')
    ->describedAs('A point given as x,y')
    ->must($checkPoint)
    ->map($createPoint);


// check  for two lines
$line1 = $cmd['line1'];
$line2 = $cmd['line2'];

if($line1 && $line2){
  $does_intersect = $line1->intersect($line2);
  $message = "The Two Lines Do " . ($does_intersect ? "" : "Not ") . "Intersect";
  echo "$message\n";
}

// check for two circles
$circle1 = $cmd['circle1'];
$circle2 = $cmd['circle2'];

if($circle1 && $circle2){
  $does_intersect = $circle1->intersect($circle2);
  $message = "The Two Circles Do " . ($does_intersect ? "" : "Not ") . "Intersect";
  echo "$message\n";
}

// check for a point and circle
$circle = $cmd['circle1'] ? $cmd['circle1'] : $cmd['circle2'];
$point = $cmd['point'];

if($circle && $point){
  $does_intersect = $point->intersect($circle);
  $message = "The Point and Circle Do " . ($does_intersect ? "" : "Not ") . "Intersect";
  echo "$message\n";
}


PHP_EOL;