<?php // content="text/plain; charset=utf-8"

require_once ('PolynomialRegression/PolynomialRegression2.php');

// Load the polynomial regression class. 

  // Data created in a spreadsheet with some random scatter.  True function should be: 
  //   f( x ) = 0.65 + 0.6 x - 6.25 x^2 + 6 x^3 
$datay = array(90.5,30,25,15,6);
$datax = array(300,150,280,230,180);

/*asort($datay);
asort($datax);*/

for($x=0; $x < count($datay); $x++) {
    $datay[$x] = (400.4428869444 + (-3.8448775893 * $datax[$x]) + (0.0092231934 * (pow($datax[$x],2))));
}

  // Precision digits in BC math. 
  //bcscale( 10 ); 

  // Start a regression class with a maximum of 4rd degree polynomial. 
  $polynomialRegression = new PolynomialRegression2( 3 ); 

  // Add all the data to the regression analysis. 
  /*foreach ( $data as $dataPoint ) 
    $polynomialRegression->addData( $dataPoint[ 0 ], $dataPoint[ 1 ] ); */
    foreach ($datax as $k => $v){
	    $polynomialRegression->addData($datax[$k], $datay[$k]);
	}

  // Get coefficients for the polynomial. 
  $coefficients = $polynomialRegression->getCoefficients(); 
 
  $functionText = "f( x ) = "; 
  foreach ( $coefficients as $power => $coefficient ) 
  { 
    if ( $power > 0 ) 
      $functionText .= " + "; 

    $functionText .= round( $coefficient, 2 ); 

    if ( $power > 0 ) 
    { 
      $functionText .= "x"; 
      if ( $power > 1 ) 
        $functionText .= "^" . $power; 
    } 
  } 

  var_export($coefficients);

?>