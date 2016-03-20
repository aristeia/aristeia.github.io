<?php

class optical_addition
{
  public  $pi   = 3.14159265358979323846;
  public  $pi_2 = 1.57079632679489661923;
  public  $pi_4 = 0.78539816339744830962;
  
  public $sphere_a = 0.0;
  public $cylinder_a = 0.0;
  public $axis_a = 0.0;
  public $sphere_b = 0.0;
  public $cylinder_b = 0.0;
  public $axis_b = 0.0;
  
  //derived attributes
  public $Sphere_a = 0.0;
  public $Cylinder_a = 0.0;
  public $Axis_a = 0.0;
  public $Sphere_b = 0.0;
  public $Cylinder_b = 0.0;
  public $Axis_b = 0.0;
  public $alpha = 0.0;
  public $cylinder_c = 0.0;
  public $gamma = 0.0;
  public $Scyl = 0.0;
  public $sphere_c = 0.0;
  public $Axis_c = 0.0;
  public $axis_c = 0.0;
  
  function add_lenses() {
    $Sphere_a = $this->sphere_a;
    $Cylinder_a = $this->cylinder_a;
    $Axis_a = $this->axis_a * $this->pi / 180;      

    $this->normalize($Sphere_a,$Cylinder_a,$Axis_a);

    $Sphere_b = $this->sphere_b;
    $Cylinder_b = $this->cylinder_b;
    $Axis_b = $this->axis_b * $this->pi / 180;

    $this->normalize($Sphere_b,$Cylinder_b,$Axis_b);
    
    //printf( "Sphere_a = %lf Cylinder_a = %lf Axis_a = %lf\n", $Sphere_a,$Cylinder_a,$Axis_a);
    //printf( "Sphere_b = %lf Cylinder_b = %lf Axis_b = %lf\n", $Sphere_b,$Cylinder_b,$Axis_b);
    //printf( "Cylinder_b = %lf Cylinder_a = %lf\n", $Cylinder_b, $Cylinder_a);
    if($Cylinder_b > $Cylinder_a) {
      $temp=$Sphere_a;
      $Sphere_a=$Sphere_b;
      $Sphere_b=$temp;

      $temp=$Cylinder_a;
      $Cylinder_a=$Cylinder_b;
      $Cylinder_b=$temp;

      $temp=$Axis_a;
      $Axis_a=$Axis_b;
      $Axis_b=$temp;
    }
    //printf( "Cylinder_b = %lf Cylinder_a = %lf\n", $Cylinder_b, $Cylinder_a);

    $this->alpha=$Axis_b-$Axis_a; 

    $cylinder_c=sqrt($Cylinder_a*$Cylinder_a + $Cylinder_b*$Cylinder_b + 2*$Cylinder_a*$Cylinder_b*cos(2*$this->alpha));
    
    if($this->equal_new( $cylinder_c, 0.0, 0.0000001)) {
      $this->gamma = 0;
      $this->Axis_c = 0;
      $this->axis_c = 0;
    } 
    else {
      $this->gamma = .5 * asin( sin(2*$this->alpha) * $this->cylinder_b / $cylinder_c);
      $this->Axis_c = $Axis_a + $this->gamma;
      $this->normalize_theta($Axis_c);
    }

    $this->Scyl = ($Cylinder_a + $Cylinder_b - $cylinder_c)/2;
    $this->sphere_c = $Sphere_a + $Sphere_b + $this->Scyl;
    $this->cylinder_c = $cylinder_c;

    $this->normalize( $this->sphere_c, $this->cylinder_c, $this->Axis_c);
    $this->axis_c = $this->Axis_c * 180 / $this->pi;
  }
  
  function normalize_theta( &$theta) {
    while($theta < 0) {
      $theta= $theta + $this->pi;
    }
    while($theta >= $this->pi) {
      $theta= $theta -$this->pi;
    }
  }
  
  function normalize_sphere_and_cylinder( &$sphere, &$cylinder, &$theta) {
    if($cylinder<0){
      $sphere= $sphere +$cylinder;
      $cylinder=  $cylinder * -1;
      $theta = $theta+ $this->pi_2;
    }
  } 
  
  function normalize( &$sphere, &$cylinder, &$theta) {
    //printf( "line 104 sphere=%lf cylinder=%lf theta=%lf\n", $sphere, $cylinder, $theta);
    $this->normalize_sphere_and_cylinder($sphere, $cylinder, $theta);
    //printf( "line 106 sphere=%lf cylinder=%lf theta=%lf\n", $sphere, $cylinder, $theta);
    $this->normalize_theta($theta);
    //printf( "line 108 theta=%lf\n", $theta);
  }
  
  
  function equal_new( $lhs, $rhs, $eps)
  {
    $tempp = $lhs-$rhs;
    if (abs($tempp)< $eps) {
      return true;
    }
    return false;
  }
  
  
  function console_print() {
    printf( "sphere_a   = %lf\n", $this->sphere_a);
    printf( "cylinder_a = %lf\n", $this->cylinder_a);
    printf( "axis_a     = %lf\n", $this->axis_a);
    
    printf( "sphere_b   = %lf\n", $this->sphere_b);
    printf( "cylinder_b = %lf\n", $this->cylinder_b);
    printf( "axis_b     = %lf\n", $this->axis_b);
    
    printf( "sphere_c   = %lf\n", $this->sphere_c);
    printf( "cylinder_c = %lf\n", $this->cylinder_c);
    printf( "axis_c     = %lf\n", $this->axis_c);
  }
  
  function __construct( 
                       $sphere_a_,
                       $cylinder_a_,
                       $axis_a_,
                       $sphere_b_,
                       $cylinder_b_,
                       $axis_b_)
  {
    $this->sphere_a = $sphere_a_;
    $this->cylinder_a = $cylinder_a_;
    $this->axis_a = $axis_a_;
    $this->sphere_b = $sphere_b_;
    $this->cylinder_b = $cylinder_b_;
    $this->axis_b = $axis_b_;
    $this->add_lenses();
  }
  
  function __destruct() {
  }
  
}

?>
