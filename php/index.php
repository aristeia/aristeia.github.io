<?php

include( "optical_addition.php");

function standard_header( $title, $header) {
  echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">\n";
  echo "<html>\n";
  printf( "<title> %s </title>\n", $title);
  printf( "<body>\n");
  printf( "<center>\n");
  printf( "<h1> %s </h1><br>\n", $header);
  printf( "</center>\n");
}

function standard_footer() {
  echo "</body>\n";
  echo "</html>\n";
}

function print_answer( $s, $c, $a) {
  echo "<center>\n";
  echo "<h2> Sum of Two Lenses </h2>\n";
  echo "</center>\n";
  echo "<table align=\"center\" border=\"1\">\n";
  echo "\n";
  printf("<tr><td><b>Sphere</b></td><td>%f</td></tr> \n", $s);
  printf("<tr><td><b>Cylinder</b></td><td>%f</td></tr> \n", $c);
  printf("<tr><td><b>Axis</b></td><td>%f</td></tr> \n", $a);
  echo "</table>\n";
  echo "\n";
}

function print_main_page( $sa, $ca, $aa, $sb, $cb, $ab) {
  echo "<form action=\"index.php\" method=\"POST\"> \n";
  echo "\n";
  echo "<table align=\"center\" border=\"1\">\n";
  echo "\n";
  printf("<tr><td><b>Sphere A</b></td><td><input type=\"text\" name=\"sphere_a\" value=\"%f\"></td></tr> \n", $sa);
  printf("<tr><td><b>Cylinder A</b></td><td><input type=\"text\" name=\"cylinder_a\" value=\"%f\"></td></tr> \n", $ca);
  printf( "<tr><td><b>Axis A</b></td><td><input type=\"text\" name=\"axis_a\" value=\"%f\"></td></tr> \n", $aa);

  printf("<tr><td><b>Sphere B</b></td><td><input type=\"text\" name=\"sphere_b\" value=\"%f\"></td></tr> \n", $sb);
  printf("<tr><td><b>Cylinder B</b></td><td><input type=\"text\" name=\"cylinder_b\" value=\"%f\"></td></tr> \n", $cb);
  printf( "<tr><td><b>Axis B</b></td><td><input type=\"text\" name=\"axis_b\" value=\"%f\"></td></tr> \n", $ab);

  echo "</table>\n";
  echo "\n";
  echo "<center>\n";
  echo "<h2> <input type=\"submit\" name=\"submit\" value=\"Calculate Sum\"> </h2>\n";
  echo "</center>\n";
  echo "\n";
  echo "</form> \n";
}

standard_header( "Over Refraction Calculator", "Over Refraction Calculator");

if (isset($_POST['sphere_a'])) {
  $oa = new optical_addition( 
                       $_POST['sphere_a'], 
                       $_POST['cylinder_a'], 
                       $_POST['axis_a'],
                       $_POST['sphere_b'], 
                       $_POST['cylinder_b'], 
                       $_POST['axis_b']);

  print_main_page(
                  $_POST['sphere_a'], 
                  $_POST['cylinder_a'], 
                  $_POST['axis_a'],
                  $_POST['sphere_b'], 
                  $_POST['cylinder_b'], 
                  $_POST['axis_b']);

  print_answer( $oa->sphere_c, $oa->cylinder_c, $oa->axis_c);


 } else {
  print_main_page( 0.0, 0.0, 0.0, 0.0, 0.0, 0.0);
 }

standard_footer();

?>
