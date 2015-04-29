<?php // content="text/plain; charset=utf-8"
require_once ('src/jpgraph.php');
require_once ('src/jpgraph_scatter.php');
require_once ('src/jpgraph_line.php');
//require_once ('src/jpgraph_utils.inc.php');

require_once ('PolynomialRegression/PolynomialRegression2.php');
 
// Create some "fake" regression data
$datay = array(90.5,30,25,15,6);
$datax = array(300,150,280,230,180);

asort($datay);
asort($datax);

/*for($x=0; $x < count($datay); $x++) {
	$datay[$x] = (400.4428869444 + (-3.8448775893 * $datax[$x]) + (0.0092231934 * (pow($datax[$x],2))));
}*/
  // Precision digits in BC math. 
bcscale( 10 ); 

$theme_class = new UniversalTheme;
$graph = new Graph(460, 585);

$graph->SetScale('linlin');
$graph->title->Set("Polynomial TrendLine");
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 14);

$reg = new PolynomialRegression2(3);

foreach ($datax as $k => $v){
    $reg->addData($datax[$k], $datay[$k]);
}

//exit(var_export($reg->getCoefficients()));

$reg1 = $reg;
list($xd1, $yd1) = $reg1->GetY(0, max($datax));

$graph1 = new Graph(460, 545);
$graph1->SetScale('linlin');

if(count($yd1) > 0) {
    if ($reg->getCoefficients()[1]) {
        $lplot1 = new LinePlot($yd1);
        $graph1->Add($lplot1);
    }
}

$graph1->Stroke('__handle');
list($xd, $yd) = $reg->GetY($graph1->xscale->scale[0], $graph1->xscale->scale[1]);

$sp1 = new ScatterPlot($datay, $datax);
$sp1->mark->SetType(MARK_FILLEDCIRCLE);
$sp1->mark->SetFillColor("#0000EE");
$sp1->SetLegend('Male Job ');
$graph->Add($sp1);
 
$lplot = new LinePlot($yd);
$lplot->SetWeight(2);
$lplot->SetColor('#CD0000');
$lplot->SetLegend('Regression Line');
$graph->Add($lplot);

exit(var_export($reg->getCoefficients()));

// ... and stroke
$graph->Stroke();


//$lr = new LinearRegression($datax, $datay);
/*$lr = new PolynomialRegression(2);

foreach ($datax as $k => $v){
    $lr->addData($datax[$k], $datay[$k]);
}*/

/*list( $xd, $yd ) = $lr->GetY(0,max($datax));
 
// Create the graph
$graph = new Graph(300,250);
$graph->SetScale('linlin');
 
// Setup title
$graph->title->Set("Linear regression");
$graph->title->SetFont(FF_ARIAL,FS_BOLD,14);
 
$graph->subtitle->SetFont(FF_ARIAL,FS_NORMAL,12);
 
// make sure that the X-axis is always at the
// bottom at the plot and not just at Y=0 which is
// the default position
$graph->xaxis->SetPos('min');
 
// Create the scatter plot with some nice colors
$sp1 = new ScatterPlot($datay,$datax);
$sp1->mark->SetType(MARK_FILLEDCIRCLE);
$sp1->mark->SetFillColor("red");
$sp1->SetColor("blue");
$sp1->SetWeight(3);
$sp1->mark->SetWidth(4);
 
// Create the regression line
$lplot = new LinePlot($yd);
$lplot->SetWeight(2);
$lplot->SetColor('navy');
 
// Add the pltos to the line
$graph->Add($sp1);
$graph->Add($lplot);*/

/*exit(var_export($lr->getCoefficients()));*/
 
// ... and stroke
/*$graph->Stroke();*/

// Load the polynomial regression class. 

  // Data created in a spreadsheet with some random scatter.  True function should be: 
  //   f( x ) = 0.65 + 0.6 x - 6.25 x^2 + 6 x^3 
/*$datay = array(90.5,30,25,15,6);
$datax = array(300,150,280,230,180);*/

/*asort($datay);
asort($datax);*/

/*for($x=0; $x < count($datay); $x++) {
	var_export($datax[$x])."\n";
    $datay[$x] = (349.62587412586959 + (-3.3730944055943635 * $datax[$x]) + (0.0081939999999999999 * (pow($datax[$x],2))));
}*/

  // Precision digits in BC math. 
  //bcscale( 10 ); 

  // Start a regression class with a maximum of 4rd degree polynomial. 
 /* $polynomialRegression = new PolynomialRegression( 3 ); */

  // Add all the data to the regression analysis. 
  /*foreach ( $data as $dataPoint ) 
    $polynomialRegression->addData( $dataPoint[ 0 ], $dataPoint[ 1 ] ); */
  /*  foreach ($datax as $k => $v){
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

  var_export($polynomialRegression);*/

?>