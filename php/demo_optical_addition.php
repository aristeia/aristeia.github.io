<?php

include( "optical_addition.php");

$dummy_oa = new optical_addition(0, 0, 0, 0, 0, 0);
$pi = 3.1415;
printf( "***********\n");

$sphere = 1.0;
$cylinder = 1.0;
$theta = -$pi/4;
printf( "calling normalize_r( 1, 1, -pi/4) with %lf %lf %lf\n", $sphere, $cylinder, $theta);
$dummy_oa->normalize( $sphere, $cylinder, $theta);
printf( "normalize( 1, 1, -pi/4) => %lf %lf %lf\n", $sphere, $cylinder, $theta);

$theta = 0;
$dummy_oa->normalize_theta( $theta);
printf( "normalize_theta(0) => %lf\n", $theta);

$theta = $pi / 2;
$dummy_oa->normalize_theta( $theta);
printf( "normalize_theta(pi/2) => %lf\n", $theta);

$theta = 3* $pi / 2;
$dummy_oa->normalize_theta( $theta);
printf( "normalize_theta(3*pi/2) => %lf\n", $theta);

$theta = -$pi / 2;
$dummy_oa->normalize_theta( $theta);
printf( "normalize_theta(-pi/2) => %lf\n", $theta);

$theta = -$pi / 4;
$dummy_oa->normalize_theta( $theta);
printf( "normalize_theta(-pi/4) => %lf\n", $theta);

$sphere = 1.0;
$cylinder = -1.0;
$theta = 0;
$dummy_oa->normalize_sphere_and_cylinder( $sphere, $cylinder, $theta);
printf( "normalize_sphere_and_cylinder( 1, -1, 0) => %lf %lf %lf\n", $sphere, $cylinder, $theta);

$sphere = -1.0;
$cylinder = -1.0;
$theta = 0;
$dummy_oa->normalize_sphere_and_cylinder( $sphere, $cylinder, $theta);
printf( "normalize_sphere_and_cylinder( -1, -1, 0) => %lf %lf %lf\n", $sphere, $cylinder, $theta);

$sphere = 1.0;
$cylinder = -1.0;
$theta = $pi/4;
$dummy_oa->normalize_sphere_and_cylinder( $sphere, $cylinder, $theta);
printf( "normalize_sphere_and_cylinder( 1, -1, pi/4) => %lf %lf %lf\n", $sphere, $cylinder, $theta);

echo "*********\n";

echo "case 0\n";
$oa0 = new optical_addition(0, 1, 0, 0, 1, 45);
$oa0->console_print();
echo "*********\n";


echo "case 1\n";
$oa1 = new optical_addition(0, 1, 0, 0, 1, 180);
$oa1->console_print();
echo "*********\n";

echo "case 2\n";
$oa2 = new optical_addition(0, -1, 0, 1, 0, 0);
$oa2->console_print();
echo "*********\n";

echo "case 3\n";
$oa3 = new optical_addition(0, 1, 0, 0, 1, 135);
$oa3->console_print();
echo "*********\n";

echo "case 4\n";
$oa4 = new optical_addition( 0, 1, 0, 0, 1, 90);
$oa4->console_print();


?>
